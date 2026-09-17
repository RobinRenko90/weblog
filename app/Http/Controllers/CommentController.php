<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Weblog;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Weblog $weblog){
        $validatedData = $request->validated();

        $comment = Comment::create($validatedData);

        return redirect()->route('weblogs.show', [$weblog]);
    }
}
