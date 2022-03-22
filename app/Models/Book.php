<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    //Add comment method in existing post model
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }


    public function bookscharacters()
    {
        return $this->hasMany('App\Models\BooksCharacters');
    }


    // mass assignable attributes

    protected $fillable = [
        'id', 'url', 'name', 'authors', 'released'
    ];


    // mass excluded attributes

    protected $hidden = [];
}
