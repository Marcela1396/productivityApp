<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProjectModel extends Model
{
    protected $table = 'project'; 
    protected $fillable = ['name', 'description','start_date', 'end_date', 'duration', 'sprint_quantity', 'state', 'project_capacity'];

    // Project has many sprints
    public function sprints()    {
        return $this->hasMany(SprintModel::class, 'project_id', 'id');
    }  

    public function teams()    {
        return $this->belongsToMany(TeamModel::class ,'project_team', 'project_id', 'team_id');
    }

    // ******************************************************************************************
    // Funciones estaticas 
    
    public static function getProjects($id=null){
        /*
        Obtiene el listado de proyectos existentes hasta el momento
        */
        $projects = DB::table('project AS p')
        ->join('project_team AS  pt', 'p.id', 'pt.project_id')
        ->join('team AS t', 'pt.team_id','t.id')
        ->join('user_team','t.id','user_team.team_id')
        ->join('users','users.id','user_team.user_id')
        ->select('p.id','p.name','p.start_date','p.end_date','p.duration', 'p.sprint_quantity','p.state',
        't.name as team_name', 'pt.project_id', 'pt.team_id');
        $id? $projects->where('users.id',$id):null;
        
        return $projects->distinct()->get();
    }


     public static function getSprints($id){
        /*
        Obtiene los Sprint pertenecientes a un proyecto
        Recibe como parametro el id del proyecto
        */
        $sprints = DB::table('project AS p')
        ->join('sprint AS  s', 'p.id', 's.project_id')
        ->select('p.id as project_id','p.name as project_name','p.sprint_quantity','p.state as project_state',
         's.id as sprint_id', 's.name as sprint_name', 's.duration', 's.start_date', 's.end_date', 's.state as sprint_state')
        ->where('p.id', '=', $id)
        ->get();

        return $sprints;
    }

    public static function detailProject($id){
        /*
        Obtiene la cantidad de Sprint que se tiene un Proyecto
        Recibe como parametro el id del proyecto
        */
        $record = DB::table('project AS p')
        ->select('p.sprint_quantity', 'p.duration')
        ->where('p.id', '=', $id)
        ->first();
        return $record;
    }

    public static function countSprint($id){
        /*
        Obtiene la cantidad de sprint que hasta el momento lleva registrado
        el proyecto
        Recibe como parametro el id del proyecto
        */
        $quantity = DB::table('project AS p')
        ->join('sprint AS  s', 'p.id', 's.project_id')
        ->where('p.id', '=', $id)
        ->count();
        return $quantity;
    }

    public static function getUsers($project){
        /* 
        Obtiene los miembros perteneciente a un equipo que ha sido asignado a un proyecto
         Recibe como parametro el id del proyecto
        */

        $users = DB::table('project as p')        
        ->join('user_project as mp','p.id', 'mp.project_id') 
        ->join('team as t' , 'mp.team_id', 't.id')
        ->join('users as m' , 'mp.user_id', 'm.id')
        ->join('role as r', 'mp.role_id', 'r.id')
        ->select('p.id as project_id','t.id as team_id', 'm.id as member_id', 'm.name as member_name', 'r.name as role_name')
        ->where('p.id', '=', $project)
        ->get();
        return $users;
    }

    public static function getDoD($project){
        /* 
        Obtiene los criterios establecidos como Definition of Done de un proyecto
         Recibe como parametro el id del proyecto
        */
        $criterias = DB::table('definition_of_done as d')
        ->join('project as p', 'd.project_id','p.id')
        ->select('d.id as dod_id', 'p.id as project_id', 'd.name as dod_name')
        ->where('d.project_id', '=', $project)
        ->get();
        return $criterias;
    }
}
