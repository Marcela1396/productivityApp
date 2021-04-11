<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SprintModel extends Model
{
    protected $table = 'sprint'; 

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

    

    
}
