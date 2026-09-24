<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWeblogRequest;
use App\Http\Requests\EditWeblogRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Weblog;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

use Auth;
use Storage;

class WeblogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('category');

        $weblogs = Weblog::where('user_id', Auth::user()->id)
                        ->orderBy('created_at', 'desc');

        if ($request->filled('category')) {
            $weblogs->whereHas('categories', function ($query) use ($search){
                $query->where('name', $search);
            });
        }

        $categories = Category::all();

        return view('weblogs.index', [
            'categories' => $categories,
            'weblogs'    => $weblogs->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('weblogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateWeblogRequest $request)
    {
        $validate = $request->validated();

        $weblog = Weblog::create($request->except('image'));

        if( $request->hasFile('image') ) {
            $imageName = $request->title.'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $weblog->image = 'images/'.$imageName;
            $weblog->save();
        }

        $syncCategories = $weblog->categories()->sync($request->category);

        return redirect('weblogs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Weblog $weblog)
    {
        $comments = Comment::where('weblog_id', $weblog->id)->get();

        return view('weblogs.show', compact(['weblog', 'comments']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weblog $weblog)
    {
        $categories = Category::all();
        $selectedCategories = $weblog->categories->pluck('id')->all();

        return view('weblogs.edit', compact('weblog', 'categories', 'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditWeblogRequest $request, Weblog $weblog)
    {
        $validateData = $request->validated(); 

        $weblog->updateOrFail($request->except('image'));

        if($request->hasFile('image')){
            if ($weblog->image) {
                Storage::disk('local')->delete($weblog->image);
            }
            $imageName = $request->title.'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $weblog->image = 'images/'.$imageName;
            $weblog->save();
        }

        $comments = Comment::where('weblog_id', $weblog->id)->get();

        $syncCategories = $weblog->categories()->sync($request->category);

        return view('weblogs.show', compact(['weblog', 'comments']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weblog $weblog)
    {
        $weblog->delete();
        
        return redirect('/weblogs')->with('success', 'Weblog is verwijderd');
    }
}
