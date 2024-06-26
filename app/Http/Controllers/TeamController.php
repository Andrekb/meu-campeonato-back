<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function listTeams(){
        $teams = Team::all();
        return response()->json($teams, 201);
    }
}
