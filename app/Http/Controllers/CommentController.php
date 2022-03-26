<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;



class CommentController extends Controller
{
    public function listAllComments()
    {
        $comments = Comment::all();
        return response()->json($comments->sortByDesc('id'));
    }

    public function create(Request $request)
    {
        $comment = new Comment;
        $comment->book_id = $request->book_id;
        $comment->content = $request->content;
        $comment->ip_address = $request->ip();
        $comment->save();
        return response()->json($comment, 201);
    }
}
