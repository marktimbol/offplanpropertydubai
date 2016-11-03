<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DisplayAllTheProjectsOfTheDeveloperTest extends TestCase
{
	use DatabaseMigrations;
	
    public function test_display_all_the_projects_of_the_developer_when_viewing_a_project()
    {
        $country = factory(App\Country::class)->create();
        
        $developer = factory(App\Developer::class)->create([
            'country_id'    => $country->id,
            'name'  => 'Dubai Properties',
            'slug'  => 'dubai-properties'
        ]);
        
    	$project = factory(App\Project::class)->create([
            'developer_id'  => $developer->id,
    		'name'	=> 'Villa Nova',
            'slug'  => 'villanova'
    	]);

    	$moreProjects = factory(App\Project::class, 5)->make([
            'developer_id'  => $developer->id,
        ]);
    	$developer->projects()->saveMany($moreProjects);

        $this->visit('dubai-properties/villanova');

    	foreach( $moreProjects as $project )
    	{
    		$this->see($project->name);
    	}
    }

    public function test_display_all_the_projects_of_the_developer_when_viewing_a_developer()
    {
        $developer = factory(App\Developer::class)->create([
            'name'  => 'Dubai Properties'
        ]);

        $moreProjects = factory(App\Project::class, 5)->make([
            'developer_id'   => $developer->id
        ]);
        $developer->projects()->saveMany($moreProjects);

        $this->visit(sprintf('/developers/%s', $developer->slug));
        foreach( $moreProjects as $project )
        {
            $this->see($project->name);
        }
    }
}
