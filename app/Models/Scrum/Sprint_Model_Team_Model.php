<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sprint_Model_Team_Model extends Model
{
    protected $table = 'sprint_team'; 
    protected $fillable = ['sprint_id', 'team_id','state',  'sprint_team_worked_hours', 'sprint_team_capacity'];

     // Funciones estaticas
     public static function getRecord($sprint,$team){
        // Funcion que retorna el id de un registro de la tabla sprint_team
        // que coincida con un equipo en especifico y un sprint
        $id = DB::table('sprint_team AS st') 
        ->select('st.id')
        ->where('st.sprint_id', '=', $sprint)
        ->where('st.team_id', '=', $team)
        ->first();
        return $id;
    }
}
