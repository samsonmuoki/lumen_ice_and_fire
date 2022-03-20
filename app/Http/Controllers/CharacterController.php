<?php

namespace App\Http\Controllers;


use App\Character;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\QueryBuilder;


class CharacterController extends Controller
{
    // public function listAllCharacters()
    // {
    //     return response()->json(Character::all());
    // }

    // public function listAllCharacters()
    // {
    //     $characters = QueryBuilder::for(Character::class)
    //         ->allowedFilters('gender')
    //         ->get();
    //     return response()->json($characters);
    // }


    public function listAllCharacters(Request $request)
    {
        $characters = $this->applyFilters($request);

        return response()->json($characters);
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
