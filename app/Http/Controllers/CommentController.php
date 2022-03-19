<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;



class CommentController extends Controller
{
    public function listAllComments()
    {
        return response()->json(Comment::all());
    }

    public function create(Request $request)
    {
        $comment = Comment::create($request->all());

        return response()->json($comment, 200);
    }
}
