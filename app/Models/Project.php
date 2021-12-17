<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = 
    [
        'name'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'project_users','project_id','user_id')
                    // ->withPivot(['is_manager'])       
                    ->withPivot(['manager_id'])       
                    ->withTimestamps()
                    ->using(ProjectUser::class);
                    // ->as('project_user');
    }

    public function managers(){
        return $this->belongsToMany(User::class,'project_users','project_id','user_id')
                    // ->withPivot(['is_manager'])            
                    ->withTimestamps();
                    // ->wherePivot('is_manager',1);
    }

}
