<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DisplayAllTheProjectsOfTheDeveloperTest extends TestCase
{
	use DatabaseMigrations;
	
    public function test_display_all_the_projects_of_the_developer_when_viewing_a_project()
    {
    	$developer = factory(App\Developer::class)->create([
    		'name'	=> 'Dubai Properties'
    	]);
    	$project = factory(App\Project::class)->make([
    		'name'	=> 'Villa Nova'
    	]);
    	$developer->projects()->save($project);

    	$moreProjects = factory(App\Project::class, 5)->make();
    	$developer->projects()->saveMany($moreProjects);

    	$this->visit(sprintf('/projects/%s', $project->slug));
    	foreach( $moreProjects as $project )
    	{
    		$this->see($project->name);
    	}
    }
}
