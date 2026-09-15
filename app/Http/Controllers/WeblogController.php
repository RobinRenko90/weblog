<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWeblogRequest;
use App\Models\Weblog;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WeblogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weblogs = Weblog::orderBy('created_at')->get();

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
