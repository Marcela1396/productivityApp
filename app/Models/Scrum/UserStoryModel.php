<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStoryModel extends Model
{
    protected $table = 'user_story'; 
    protected $fillable = ['name', 'description','state', 'priority', 'sprint_id'];

    // User Story belongs to SprintBacklog
    public function backlog()
    {
        return $this->belongsTo(SprintModel::class, 'sprint_id', 'id');
    }

    // User Story has many Task
    public function tasks()    {
        return $this->hasMany(TaskModel::class,'user_story_id', 'id');
    }

}
