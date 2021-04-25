<?php

namespace App\Http\Controllers\Scrum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Adicionales 

use App\Models\Scrum\ProjectModel;
use App\Models\Scrum\DoDModel;
use App\Models\Scrum\TeamModel;
use App\Models\Scrum\RoleModel;
use App\Models\Scrum\Project_Model_Team_Model;
use App\Models\Scrum\Member_Model_Team_Model;
use Illuminate\Support\Facades\DB;

class Project extends Controller
{
    public function index(){
        $projects= ProjectModel::getProjects();
        return view('dashboard.projects.list', ['projects' => $projects]);
    }

    public function form_create_project(){
        $teams = TeamModel::getTeams();
        return view('dashboard.projects.create', ['team' =>$teams]);
    }

    public function form_create_project2(Request $request){
        //dd($request->all());
        $members = TeamModel::getMembers($request->input('team_id'));
        $roles = RoleModel::all();
        $data = $request->all();
        return view('dashboard.projects.create2', ['members'=>$members, 'roles'=>$roles, 'data'=>$data]);
    }

    public function register_project(Request $request){
        
        // Inserta los datos basicos del proyecto
        $item = new ProjectModel();
        $item->name = $request->input('project_name');
        $item->description = $request->input('project_description');
        $item->start_date = $request->input('project_start_date');
        $item->duration = $request->input('project_duration');
        $item->sprint_quantity = $request->input('sprint_quantity');
        $item->save();

        if($item){
            // Crea un registro en la tabla project_team, la cual tiene 
            // información del proyecto y el equipo asignado
            $item2 = new Project_Model_Team_Model();
            $item2->project_id = $item->id;
            $item2->team_id = $request->input('team_id');
            $item2->save();

            // Ahora bien si creo un registro en la  tabla project_team
            if($item2){
                /*
                Prosigue a actualizar el rol de un miembro de un equipo
                ya que por defecto era product owner (Tabla Member_Team)
                Para ello requiere el team_id, member_id y el id del proyecto al cual 
                pertenece dicho integrante
                */
                // Obtiene el id del proyecto, del proyecto team  y del equipo
                $project = $item->id;
                $project_team = $item2->id;
                $team = $item2->team_id;
                //Obtiene los miembros del equipo que selecciono
                $members = TeamModel::getMembers($item2->team_id);
                foreach($members as $m){
                    $member = $request->input('member_'.$m->member_id);
                    $id = Member_Model_Team_Model::getMember($project, $project_team, $team, $member);
                    $item3 = Member_Model_Team_Model::findOrFail($id->member_team_id);
                    $item3->role_id = $request->input('role_'.$m->member_id); 
                    $item3->save();
                }
            }
            
         // Add DOD to Project
            $dod = $request->input('.dod-input');
            $count = 0;
            while(true){ 
                $var = $request->input('dod_name_'.$count);
                if(!$var){
                    break;
                }
                $item4 = new DoDModel();
                $item4->project_id = $item->id;
                $item4->name = $var;
                $item4->save();
                $count = $count + 1;    
            }  
        }
       
        return redirect()->route('projects');  
    }

    /*
    public function allocate_team(){
        $projects = ProjectModel::all();  
        $teams = TeamModel::all(); 
        return view('dashboard.projects.allocateTeam',['teams' => $teams, 'projects' => $projects] );
    }

    public function save_team(Request $request){
        $item = new Project_Model_Team_Model();
        $item->team_id = $request->input('team_id');
        $item->project_id = $request->input('project_id');
        $item->save();

        $project_id = $request->input('project_id');

        $project = ProjectModel::find($project_id);
        $project->state = $request->input('state');
        $project->save();

        return redirect()->route('allocate_team');
    }

    public function start_project(){
        
    }
    */
}
