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
        return view('admin.dashboard.teams.list', ['team' =>$teams]);
    }

    public function form_create_team(){
        $members= UserModel::all();
        return view('admin.dashboard.teams.create',[ 'members' => $members]);
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
        $members= UserModel::all();
        $team_member = TeamModel::getUsers($id);
        // -> Aqui $team_member genera una coleccion de los usuarios que pertenecen hasta el momento en ese equipo
        $selected = collect();
        $unselected = UserModel::all();
        $as = collect();
        
        foreach($team_member as $t){
            foreach($members as $m){
            //$data->push($t->member_id);
            // Aqui obtengo unicamente los id de las personas que pertenecen a ese equipo 
                if($t->member_id == $m->id){
                    $selected->push($m);
                    // Aqui descarto aquellos que nunca fueron señalados
                    $unselected = $unselected->except($m->id);
                    break; 
                }  
            }
        }
        return view('admin.dashboard.teams.update', ['team' => $team, 'members' => $members, 'selected' =>$selected, 'unselected' =>$unselected]);
    }

    public function update_team(Request $request, $id){
        //dd($request->all());
        $item = TeamModel::findOrFail($id);
        $item->name = $request->input('team_name');
        $item->description = $request->input('team_description');
        $item->save();

        // Obtenga todos los miembros existentes 
        $members = UserModel::all();
        // Cree una nueva coleccion
        $users = collect();
        foreach($members as $m){
            // Agregue a la nueva coleccion solo los miembros cuyo id vengan en el formulario
            if($m->id == $request->input('member_id_'.$m->id)){
                $users->push($m);
            }
        }

       
       // Prosiga a actualizar el modelo User_Team
        foreach($users as $m){
            $record = User_Model_Team_Model::getRecord($id, $m->id);
            if($record == 0){
                $item2 = new User_Model_Team_Model();
                $item2->team_id = $item->id;
                $item2->user_id = $request->input('member_id_'.$m->id);
                $item2->save(); 
            }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
        }
        return redirect()->route('teams');
    }

    public function delete_team($id){
        $item = TeamModel::findOrFail($id);
        $item->delete();
        return redirect()->route('teams');
    }
}

