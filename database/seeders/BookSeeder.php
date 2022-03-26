<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;


use App\Models\Book;
use App\Models\BooksCharacters;
use Throwable;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Http::get('https://www.anapioficeandfire.com/api/books', ['pageSize' => 50])->json();
        foreach ($books as $book) {
            $url = $book['url'];
            $id = explode("/", $url)[5];
            $name = $book['name'];
            $authors = $book['authors'][0];  // TODO convert from list to string
            $released = $book['released'];
            $characters = $book['characters'];

            Book::firstOrCreate(
                ['id' => $id],
                ['name' => $name, 'authors' => $authors, 'released' => $released]
            );

            try {
                foreach ($characters as $character) {
                    $characterId = explode("/", $character)[5];
                    BooksCharacters::firstOrCreate(
                        ['book_id' => $id, 'character_id' => $characterId],
                    );
                }
            } catch (Throwable $e) {
                report($e);

                // return false;
            }
        }
    }
}
