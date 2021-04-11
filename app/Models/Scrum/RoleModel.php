<?php

namespace App\Models\Scrum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'role'; 

    public function members()    {
        return $this->hasMany(MemberModel::class,'role_id', 'id');
    }
}
