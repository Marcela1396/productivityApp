<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Scrum\ProjectModel;
use App\Models\Scrum\SprintModel;
use App\Models\Scrum\User_Model_Sprint_Model;
use Illuminate\Support\Facades\DB;

class Sprint extends Controller
{
    public function index($id){
        //$project = ProjectModel::findOrFail($id);
        $sprints = ProjectModel::getSprints($id);
        $record = (ProjectModel::detailProject($id)); // Obtiene los datos de un proyecto: duracion, cantidad de sprint
        $quantity_actual =  ProjectModel::countSprint($id); // Obtiene la cantidad de sprint que tiene el proyecto actualmente
        $result = SprintModel::countWeeks($id); // Obtiene la cantidad de semanas acumuladas que tiene un proyecto
        $weeks_sprint = 0;
        if($result->duration != null){
            $weeks_sprint = $result->duration;
        }
        //
        return view('dashboard.sprints.list',
                    [
                    'sprints' => $sprints, 
                    'project' => $id, 
                    'record' =>$record,
                    'quantity_actual' =>$quantity_actual,
                    'weeks_sprint'=> $weeks_sprint
                    ]);
    }

    public function form_create_sprint($project){
        $members = ProjectModel::getUsers($project);
        $weeks_project = (ProjectModel::detailProject($project))->duration;
        $quantity_sprint_project = (ProjectModel::detailProject($project))->sprint_quantity;
        $record = round($weeks_project/$quantity_sprint_project,2);
        return view('dashboard.sprints.create', ['project' =>$project, 'members' => $members, 'record' =>$record]);
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
                $item2->save();
            }
        }
        return redirect()->route('sprints', $item->project_id);   
    }



    
}
