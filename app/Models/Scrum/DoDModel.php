<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoDModel extends Model
{
    protected $table = 'definition_of_done'; 

    // DoD Critery belongs to Sprint
    public function sprint()
    {
        return $this->belongsTo(SprintModel::class, 'sprint_id', 'id');
    }
    // DoD Critery has to One Task
    public function task()    {
        return $this->hasOne(TaskModel::class,'id','id');
    }

}
