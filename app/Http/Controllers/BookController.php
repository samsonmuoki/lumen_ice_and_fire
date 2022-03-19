<?php


namespace App\Http\Controllers;


use App\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function listAllBooks()
    {
        // $books = Book::all();
        $books = Book::with('bookscharacters', 'comments')->get();
        return response()->json($books->sortBy('released'));
    }

    // public function listOneBook($id)
    // {
    //     return response()->json(Book::find($id));
    // }

    public function listOneBook($id)
    {
        // $comments = Book::find(1)->comments;  // displays comments only

        // $characters = Book::find(1)->bookscharacters;  // displays characters only
        // return response()->json($characters);

        $book = Book::where('id', $id)
            ->with(['bookscharacters', 'comments'])
            ->first();
        return response()->json($book);
    }

    public function create(Request $request)
    {
        $book = Book::create($request->all());

        return response()->json($book, 201);
    }
}
