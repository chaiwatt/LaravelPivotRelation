<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $project_users = Project::with('users')->get();
        $project_managers = Project::with('managers')->get();
        return view('home',[
            'project_users' => $project_users,
            'project_managers' => $project_managers
        ]);
    }
}
