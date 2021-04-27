<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scrum\TeamModel;
use App\Models\Scrum\UserModel;
use App\Models\Scrum\RoleModel;
use App\Models\Scrum\User_Model_Team_Model;

class Team extends Controller
{
    public function index(){
        $teams = TeamModel::getTeams();
        return view('dashboard.teams.list', ['team' =>$teams]);
    }

    public function form_create_team(){
        $members= UserModel::all();
        return view('dashboard.teams.create',[ 'members' => $members]);
    }

    public function register_team(Request $request){
        //dd($request->all());
        $item = new TeamModel();
        $item->name = $request->input('team_name');
        $item->description = $request->input('team_description');
        $item->save();
    
        // Obtenga todos los miembros existentes 
        $members = UserModel::all();
        // Cree una nueva coleccion
        $collection= collect();
        foreach($members as $m){
            // Agregue a la nueva coleccion solo los miembros cuyo id vengan en el formulario
            if($m->id == $request->input('member_id_'.$m->id)){
                $collection->push($m);
            }
        }      
        
        if($item){
            foreach($collection as $m){
                $item2 = new User_Model_Team_Model();
                $item2->team_id = $item->id;
                $item2->user_id = $request->input('member_id_'.$m->id);
                $item2->save(); 
            }
        }
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

