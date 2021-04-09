<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $table = 'sprint'; 

    // Sprint belongs to Project
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    // Sprint has one Sprint Backlog
    public function backlog()    {
        return $this->hasOne(SprintBacklog::class,'id');
    } 

    // Sprint has many Definition of Done
    public function dod()    {
        return $this->hasMany(DoD::class,'id');
    } 

    
}
