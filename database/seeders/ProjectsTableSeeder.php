<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Project::class, 10)->create();
        Project::factory()->count(10)->create(); 

        foreach(Project::all() as $project){
            $users = User::inRandomOrder()->take(rand(1,3))->pluck('id');

            foreach($users as $user){
                // $project->users()->attach($user,['is_manager' => rand(0,1)]);
                $project->users()->attach($user,['manager_id' => User::inRandomOrder()->first()->id]);
            }

            //$project->users()->attach($users);
            
        }
    }
}
