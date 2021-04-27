<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member_Model_Team_Model extends Model
{
    protected $table = 'user_team'; 
    protected $fillable = ['team_id', 'user_id'];
   

    /*
    Funciones estaticas
    */
    /*
    Obtener el integrante de un equipo que cumpla la condición 
    de pertenecer a un equipo y a un proyecto determinado
    
    public static function getMember($project, $project_team, $team, $member){
        $member = DB::table('project AS p')
        ->join('project_team AS  pt', 'p.id', 'pt.project_id')
        ->join('team AS t', 'pt.team_id','t.id')
        ->join('member_team as mt', 'mt.team_id', 't.id')
        ->select('mt.id as member_team_id')
        ->where('p.id', '=', $project)
        ->where('pt.id', '=', $project_team)
        ->where('mt.team_id', '=', $team)
        ->where('mt.member_id', '=', $member)
        ->first();
        return $member;
    }
    */
}
