<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TeamModel extends Model
{
    protected $table = 'team'; 

    // Pendiente
     // Relation Team has Many to Many Members
     public function members(){
        return $this->belongsToMany(MemberModel::class, 'member_id', 'team_id');
    }

     // Pendiente
     // Relation Team has Many to Sprints
     public function sprints(){
        return $this->belongsToMany(SprintModel::class, 'sprint_id', 'team_id');
    }

    //
    public function projects()    {
        return $this->belongsToMany(ProjectModel::class, 'project_team','team_id', 'project_id');
    }

    // ******************************************************************************************
    // Funciones estaticas 
    
    public static function getTeams(){
        /* 
        Obtiene la información de todos los equipos existentes
        */
        $teams = DB::table('team')->get();
        return $teams;
    }

    public static function getTeam($id){
        /* 
        Obtiene la información de un equipo (Nombre)
        Recibe como parametro el id del equipo a consultar
        */
        $team = DB::table('team')
        ->select('name')
        ->where('id', '=', $id)
        ->first();
        return $team;
    }

    public static function getMembers($id){
        /* 
        Obtiene los integrantes de un equipo
        Recibe como parametro el id del equipo a consultar
        */
        $members = DB::table('team as t')
        ->join('member_team as mt','t.id', 'mt.team_id')
        ->join('member as m' , 'mt.member_id', 'm.id')
        ->select('t.id as team_id', 'm.id as member_id', 'm.name as member_name', )
        ->where('t.id', '=', $id)
        ->get();
        return $members;  
    }




    
}
