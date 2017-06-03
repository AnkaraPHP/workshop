<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function show(Team $team)
    {
        return view('team.show', [
            "team" => $team,
        ]);
    }
}
