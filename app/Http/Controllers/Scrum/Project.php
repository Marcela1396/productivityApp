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
use App\Models\Scrum\User_Model_Team_Model;
use App\Models\Scrum\Users_Model_Project_Model;
use Illuminate\Support\Facades\DB;



class Project extends Controller
{
    public function index(){
        $projects= ProjectModel::getProjects();
        return view('admin.dashboard.projects.list', ['projects' => $projects]);
    }

    public function form_create_project(){
        $teams = TeamModel::getTeams();
        return view('admin.dashboard.projects.create', ['team' =>$teams]);
    }

    public function form_create_project2(Request $request){
        //dd($request->all());
        $members = TeamModel::getUsers($request->input('team_id'));
        $roles = RoleModel::all();
        $data = $request->all();
        return view('admin.dashboard.projects.create2', ['members'=>$members, 'roles'=>$roles, 'data'=>$data]);
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

            // Ahora bien si creo un registro en la  tabla user_project
            if($item2){
                //Obtiene los miembros del equipo que selecciono
                $members = TeamModel::getUsers($item2->team_id);
                foreach($members as $m){
                    $item3 = new Users_Model_Project_Model();
                    $item3->project_id = $item->id;
                    $item3->team_id = $item2->team_id;
                    $item3->user_id = $request->input('member_'.$m->member_id);
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

    
}
