<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProjectModel extends Model
{
    protected $table = 'project'; 

    // Project has many sprints
    public function sprints()    {
        return $this->hasMany(SprintModel::class, 'project_id', 'id');
    }  

    public function teams()    {
        return $this->belongsToMany(TeamModel::class ,'project_team', 'project_id', 'team_id');
    }

    // ******************************************************************************************
    // Funciones estaticas 
    
    public static function getProjects(){
        /*
        Obtiene el listado de proyectos existentes hasta el momento
        */
        $projects = DB::table('project AS p')
        ->join('project_team AS  pt', 'p.id', 'pt.project_id')
        ->join('team AS t', 'pt.team_id','t.id')
        ->select('p.id','p.name','p.start_date','p.end_date','p.sprint_quantity','p.state',
        't.name as team_name', 'pt.project_id', 'pt.team_id')
        ->get();
        return $projects;
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

    public static function getMembers($project){
        /* 
        Obtiene los miembros perteneciente a un equipo que ha sido asignado a un proyecto
         Recibe como parametro el id del proyecto
        */

        $members = DB::table('project as p')
        ->join('project_team AS  pt', 'p.id', 'pt.project_id')
        ->join('team as t' , 'pt.team_id', 't.id')
        ->join('member_team as mt','t.id', 'mt.team_id')
        ->join('member as m' , 'mt.member_id', 'm.id')
        ->join('role as r', 'm.role_id', 'r.id')
        ->select('p.id as project_id','t.id as team_id', 'm.id as member_id', 'm.name as member_name', 'r.name as role_name')
        ->where('p.id', '=', $project)
        ->get();
        return $members;
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
