<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWeblogRequest;
use App\Http\Requests\EditWeblogRequest;
use App\Models\Comment;
use App\Models\Weblog;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Auth;

class WeblogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weblogs = Weblog::where('user_id', Auth::user()->id)
                        ->orderBy('created_at', 'desc')->get();

        return view('weblogs.index', compact('weblogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('weblogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateWeblogRequest $request)
    {
        $validate = $request->validated();

        $weblog = Weblog::create($validate);

        return redirect('weblogs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Weblog $weblog)
    {
        $comments = Comment::where('weblog_id', $weblog->id)->get();

        // dd($comments);

        return view('weblogs.show', compact(['weblog', 'comments']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weblog $weblog)
    {
        return view('weblogs.edit', compact('weblog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditWeblogRequest $request, Weblog $weblog)
    {
        $validateData = $request->validated(); 

        $weblog->updateOrFail($validateData);

        $comments = Comment::where('weblog_id', $weblog->id)->get();


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
