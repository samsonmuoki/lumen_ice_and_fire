<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Character extends Model
{
    // mass assignable attributes

    protected $fillable = [
        'id', 'url', 'name', 'gender', 'date_of_birth'
    ];


    // mass excluded attributes
    protected $hidden = [];
}
