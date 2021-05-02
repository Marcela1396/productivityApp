<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Scrum\ProjectModel;
use App\Models\Scrum\SprintModel;
use App\Models\Scrum\User_Model_Sprint_Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Sprint extends Controller
{
    public function index($id){      
        $user = User::find(auth()->user()->id);
        // Valida si el usuario es administrador o no 
        if($user){
            if($user->hasAnyRole(['super-admin'])){
                $sprints = ProjectModel::getSprints($id);
            }else{
                // Sino es admin le muestra unicamente los sprint en los cuales esta agregado
                $sprints = ProjectModel::getSprints($id,$user->id);
            }
        }
  
        $record = (ProjectModel::detailProject($id)); // Obtiene los datos de un proyecto: duracion, cantidad de sprint
        $quantity_actual =  ProjectModel::countSprint($id); // Obtiene la cantidad de sprint que tiene el proyecto actualmente
        
        return view('admin.dashboard.sprints.list',
                [
                'sprints' => $sprints, 
                'project' => $id, 
                'record' =>$record,
                'quantity_actual' =>$quantity_actual
                ]);
    }

    public function form_create_sprint($project){
        //dd($project);
        $members = ProjectModel::getUsers($project);
        $weeks_project = (ProjectModel::detailProject($project))->duration; // Obtiene la duracion del proyecto
        $quantity_sprint_project = (ProjectModel::detailProject($project))->sprint_quantity; // Obtiene la cantidad de sprint del proyecto
        $size = round($weeks_project/$quantity_sprint_project,2); // Obtiene el tamaño del sprint de acuerdo con la duracion y la cantidad de sprints
        return view('admin.dashboard.sprints.create', ['project' =>$project, 'members' => $members, 'size' =>$size]);
    }

    public function register_sprint(Request $request){
        //dd($request->all());
        $item = new SprintModel();
        $item->name = $request->input('sprint_name');
        $item->description = $request->input('sprint_description');
        $item->start_date = $request->input('sprint_start_date');
        $item->duration = $request->input('sprint_duration');
        $item->project_id = $request->input('project');
        $item->save();

        $members = ProjectModel::getUsers($request->input('project'));

        if($item){
            foreach($members as $m){
                $item2 = new User_Model_Sprint_Model();
                $item2->user_id = $m->member_id;
                $item2->sprint_id = $item->id;
                $item2->assigned_hours = $request->input('assigned_hours_'.$m->member_id);
                $item2->total_assigned_hours = ($request->input('assigned_hours_'.$m->member_id)) * ($item->duration) ;
                $item2->save();
            }
        }
        return redirect()->route('sprints', $item->project_id);   
    }

   
    
}
