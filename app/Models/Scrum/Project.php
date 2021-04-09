<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project'; 

    // Project has many sprints
    public function sprints()    {
        return $this->hasMany(Sprint::class,'id');
    }  
}
