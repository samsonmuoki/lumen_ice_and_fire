<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

use App\Models\Character;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $characters = Http::get('https://www.anapioficeandfire.com/api/characters', ['pageSize' => 50])->json();
        foreach ($characters as $character) {
            $url = $character['url'];
            $id = explode("/", $url)[5];
            $name = $character['name'];
            $gender = $character['gender'];
            $date_of_birth = '2000-01-10';

            Character::firstOrCreate([
                'id' => $id,
                'url' => $url,
                'name' => $name,
                'gender' => $gender,
                'date_of_birth' => $date_of_birth,
            ]);
        }
    }
}
