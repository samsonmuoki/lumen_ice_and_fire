<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    // mass assignable
    protected $fillable = [
        'book_id', 'content'
    ];


    // mass excluded
    protected $hidden = [];
}
