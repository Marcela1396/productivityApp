<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
