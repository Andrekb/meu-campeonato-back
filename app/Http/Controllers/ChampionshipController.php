<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Championship;
use App\Models\Team;

class ChampionshipController extends Controller
{
    public function index()
    {
        $champs =  Championship::all();
        return response()->json($champs, 201);
    }

    public function newChampionship()
    {
        $teams = Team::all();
        return response()->json($teams, 201);
    }


    public function createChampionship(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'teams' => 'required|array|size:8',
            'teams.*' => 'required|exists:teams,id',
        ], [
            'name.required' => 'O nome do campeonato é obrigatório.',
            'name.string' => 'O nome do campeonato deve ser uma string.',
            'name.max' => 'O nome do campeonato não pode ter mais de 255 caracteres.',
            'teams.required' => 'A lista de times é obrigatória.',
            'teams.array' => 'A lista de times deve ser um array.',
            'teams.size' => 'A lista de times deve conter exatamente 8 times.',
            'teams.*.required' => 'Cada time é obrigatório.',
            'teams.*.exists' => 'O time selecionado não existe.',
        ]);

        $championship = Championship::create($request->all());

        $championship->teams()->sync($request->teams);

        return response()->json($championship, 201);
    }
}
