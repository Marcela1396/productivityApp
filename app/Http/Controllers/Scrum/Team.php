<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scrum\TeamModel;

class Team extends Controller
{
    public function index(){
        $teams = TeamModel::getTeams();
        return view('dashboard.teams.list', ['team' =>$teams]);
    }

    public function form_create_team(){
        return view('dashboard.teams.create');
    }

    public function register_team(Request $request){
        $item = new TeamModel();
        $item->name = $request->input('team_name');
        $item->description = $request->input('team_description');
        $item->save();
        return redirect()->route('teams');
    }

    public function form_update_team($id){
        $team = TeamModel::findOrFail($id);
        return view('dashboard.teams.update', ['team' => $team]);
    }

    public function update_team(Request $request, $id){
        $item = TeamModel::findOrFail($id);
        $item->name = $request->input('team_name');
        $item->description = $request->input('team_description');
        $item->save();
        return redirect()->route('teams');
    }

    public function delete_team($id){
        $item = TeamModel::findOrFail($id);
        $item->delete();
        return redirect()->route('teams');
    }
}

