<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BooksCharacters extends Model
{
    // mass assignable
    protected $fillable = [
        'book_id', 'character_id'
    ];


    // mass excluded
    protected $hidden = [];
}
