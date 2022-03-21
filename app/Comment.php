<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    // mass assignable
    protected $fillable = [
        'book_id', 'content', 'ip_address'
    ];


    // mass excluded
    protected $hidden = [];
}
