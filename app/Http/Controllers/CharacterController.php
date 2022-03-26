<?php

namespace App\Http\Controllers;


use App\Models\Character;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\QueryBuilder;


class CharacterController extends Controller
{
    // public function listAllCharacters(Request $request)
    // {
    //     $characters = QueryBuilder::for(Character::class)
    //         ->allowedFilters(['gender'])
    //         ->get('name');
    //     return response()->json($characters);
    // }


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

    private function applyFilters(Request $request): Collection
    {
        return Character::query()
            ->when($request->query('gender'), fn (Builder $query, $gender) => $query->where('gender', $gender))
            ->get();
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
