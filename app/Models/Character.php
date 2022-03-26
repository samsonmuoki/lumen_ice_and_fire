<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;


class Character extends Model
{
    /**
     * Get the age of a character using the date of birth.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function ageInYears(): Attribute
    {
        return new Attribute(
            get: fn () => number_format((float)Carbon::parse($this->attributes['date_of_birth'])->diffInMonths(Carbon::now()) / 12, 1, '.', ''),
        );
    }

    protected function ageInMonths(): Attribute
    {
        return new Attribute(
            get: fn () => Carbon::parse($this->attributes['date_of_birth'])->diffInMonths(Carbon::now()),
        );
    }


    // mass assignable attributes

    protected $fillable = [
        'id', 'name', 'gender', 'date_of_birth'
    ];


    // mass excluded attributes
    protected $hidden = [];


    // below is test code
    protected $appends = ['age_in_years', 'age_in_months'];
}
