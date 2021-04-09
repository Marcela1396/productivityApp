<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SprintBacklog extends Model
{
    protected $table = 'sprint_backlog'; 

    // SprintBacklog belongs to Sprint
    public function sprint()
    {
        return $this->belongsTo(Sprint::class, 'sprint_id', 'id');
    }

}
