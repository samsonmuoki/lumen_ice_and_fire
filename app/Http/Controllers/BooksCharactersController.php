<?php


namespace App\Http\Controllers;

use App\BooksCharacters;
use Illuminate\Http\Request;



class BooksCharactersController extends Controller
{
    public function listAllBooksCharacters()
    {
        return response()->json(BooksCharacters::all());
    }
    public function create(Request $request)
    {
        $bookcharacter = BooksCharacters::create($request->all());

        return response($bookcharacter, 201);
    }
}
