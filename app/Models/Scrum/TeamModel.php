<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
}
