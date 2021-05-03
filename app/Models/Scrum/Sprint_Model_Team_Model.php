<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint_Model_Team_Model extends Model
{
    protected $table = 'sprint_team'; 
    protected $fillable = ['sprint_id', 'team_id','state',  'sprint_team_worked_hours', 'sprint_team_capacity'];
}
