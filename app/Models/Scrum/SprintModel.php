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
    
    public static function getStories($id, $user=null){
    /* 
        Obtiene las historias de usuario pertenecientes a un Sprint
        Recibe como parametro el id del Sprint
    */
        $stories = DB::table('project AS p')
        ->join('sprint AS  s', 'p.id', 's.project_id')
        ->join('user_story AS us', 's.id', 'us.sprint_id')
        ->join('user_user_story as uus', 'uus.user_story_id', 'us.id')
        ->join('users as u', 'uus.user_id', 'u.id')
        ->select('p.id as project_id', 's.id as sprint_id', 's.name as sprint_name', 's.duration', 's.state as sprint_state',
        'us.id as story_id', 'us.name as story_name', 'us.priority', 'us.state as story_state', 
        'uus.state as uu_story_state', 'uus.worked_hours as story_worked_hours')
        ->where('s.id', '=', $id)
        ->orderby('us.priority', 'desc');
        
        $user? $stories->where('u.id',$user):null;

        return $stories->distinct()->get();

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

    public static function countWeeks($id){
        /*
        Obtiene la cantidad de semanas que se llevan acumuladas hasta el momento en un  proyecto
        por los sprint que tiene 
        Recibe como parametro el id del proyecto
        */
        $weeks = DB::table('project AS p')
        ->join('sprint AS  s', 'p.id', 's.project_id')
        ->select(DB::raw('SUM(s.duration) as duration'))
        ->where('p.id', '=', $id)
        ->first();
        return $weeks;
        
    }


    
}
