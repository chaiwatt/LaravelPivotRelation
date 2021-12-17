<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectUser extends Pivot
{
    use HasFactory;

    public function manager(){
        return $this->belongsTo(User::class, 'manager_id');
    }
}
