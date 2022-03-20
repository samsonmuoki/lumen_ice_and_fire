<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    //Add comment method in existing post model
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    public function bookscharacters()
    {
        return $this->hasMany('App\BooksCharacters');
    }


    // mass assignable attributes

    protected $fillable = [
        'id', 'name', 'authors', 'released'
    ];


    // mass excluded attributes

    protected $hidden = [];
}
