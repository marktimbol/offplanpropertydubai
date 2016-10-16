<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$developers = factory(App\Developer::class, 10)->create();
    	foreach($developers as $developer)
    	{
    		$projects = factory(App\Project::class, 10)->make();
    		$developer->projects()->saveMany($projects);
    	}
    }
}
