<?php

namespace App\Http\Controllers;


use App\Models\Character;
use Illuminate\Http\Request;



class CharacterController extends Controller
{
    public function listAllCharacters(Request $request)
    {
        $characters = $this->applyFilters($request);

        $number_of_characters = $characters->count();
        $total_age_in_years = $characters->sum('age_in_years');
        $total_age_in_years = number_format((float)$characters->sum('age_in_years'), 2, '.', '');
        $total_age_in_months = $characters->sum('age_in_months');
        $payload = array(
            'number_of_characters' => $number_of_characters,
            'total_age_in_years' => $total_age_in_years,
            'total_age_in_months' => $total_age_in_months,
            'characters' => $characters
        );
        return response()->json($payload);
    }

    private function applyFilters(Request $request)
    {
        $characters = Character::all();

        $genderFilter = $request->input('gender');
        if ($genderFilter) {
            $characters = Character::query()
                ->when($genderFilter, fn ($query, $genderFilter) => $query->where('gender', $genderFilter))
                ->get();
        }

        $sortByGender = $request->input('sort_by_gender');
        if ($sortByGender) {
            $characters = Character::query()
                ->when($sortByGender, fn ($query, $sortByGender) => $query->orderBy('gender', $sortByGender))->get();
        }

        $sortByName = $request->input('sort_by_name');
        if ($sortByName) {
            $characters = Character::query()
                ->when($sortByName, fn ($query, $sortByName) => $query->orderBy('name', $sortByName))->get();
        }

        $sortByAge = $request->input('sort_by_age');
        if ($sortByAge) {
            $characters = Character::query()
                ->when($sortByAge, fn ($query, $sortByAge) => $query->orderBy('age', $sortByAge))->get();
        }

        return $characters;
    }

    public function listOneCharacter($id)
    {
        return response()->json(Character::find($id));
    }

    public function create(Request $request)
    {
        $character = Character::create($request->all());

        return response()->json($character, 201);
    }
}
