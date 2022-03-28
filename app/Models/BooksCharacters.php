<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

use App\Models\Character;


class BooksCharacters extends Model
{
    /**
     * Get the age of a character using the date of birth.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function characterName(): Attribute
    {
        return new Attribute(
            get: fn () => Character::where('id', $this->attributes['character_id'])->first()->name,
        );
    }

    // mass assignable
    protected $fillable = [
        'book_id', 'character_id'
    ];


    // mass excluded
    protected $hidden = [];

    protected $appends = ['character_name'];
}
