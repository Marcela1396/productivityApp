<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SprintModel extends Model
{
    protected $table = 'sprint'; 
    protected $fillable = ['project_id', 'name', 'description','start_date', 'end_date', 'duration', 'state'];

    // Sprint belongs to Project
    public function project()
    {
        return $this->belongsTo(ProjectModel::class, 'project_id', 'id');
    }

     // Sprint  has many User History
     public function stories() {
         return $this->hasMany(User_StoryModel::class,'sprint_id', 'id');
     }

    // Sprint has many Definition of Done
    public function dod() 
    {
        return $this->hasMany(DoDModel::class,'sprint_id', 'id');
    } 

     // Pendiente
     // Relation Sprints has Many to Teams
     public function teams(){
        return $this->belongsToMany(TeamModel::class, 'team_id', 'sprint_id');
    }


    // ******************************************************************************************
    // Funciones estaticas 
    
    public static function getStories($id){
    /* 
        Obtiene las historias de usuario pertenecientes a un Sprint
        Recibe como parametro el id del Sprint
    */
        $stories = DB::table('project AS p')
        ->join('sprint AS  s', 'p.id', 's.project_id')
        ->join('user_story AS u', 's.id', 'u.sprint_id')
        ->select('p.id as project_id', 's.id as sprint_id', 's.name as sprint_name', 's.duration', 's.state as sprint_state',
        'u.id as story_id', 'u.name as story_name', 'u.state as story_state', 'u.priority')
        ->where('s.id', '=', $id)
        ->orderby('u.priority', 'desc')
        ->get();

        return $stories;
    }
    
    public static function getTeam($id){
        /* 
        Obtiene la información del equipo el cual tiene a cargo ese Sprint
        Recibe como parametro el id del Sprint
        */
        $team = DB::table('sprint AS  s')
        ->join('project AS p', 's.project_id', 'p.id')
        ->join('project_team AS  t', 'p.id', 't.project_id')
        ->select('t.team_id', 'p.id as project_id', 's.id as sprint_id')
        ->where('s.id', '=', $id)
        ->first();
        return $team;    
    }
}
