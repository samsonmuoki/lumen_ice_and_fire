<?php


namespace App\Http\Controllers;


use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class BookController extends Controller
{
    public function listAllBooks()
    {
        $books = Book::with('bookscharacters')->withCount('comments')->get();
        return response()->json($books->sortBy('released'));
    }

    public function listOneBook($id)
    {
        // $comments = Book::find(1)->comments;  // displays comments only
        $book = Book::where('id', $id)
            ->with('bookscharacters')
            ->with(['comments' => function ($query) {
                $query->orderBy('id', 'desc');
            }])
            ->first();
        return response()->json($book);
    }

    public function create(Request $request)
    {
        $book = Book::create($request->all());

        return response()->json($book, 201);
    }
}
