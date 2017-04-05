<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitorCanViewAllTheCommunitiesTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_visitor_can_view_all_the_available_communities()
    {
    	$community = factory(App\Community::class)->create([
            'name'  => 'Dubai Marina'
        ]);
        $project = factory(App\Project::class)->create();

        $community->projects()->attach($project);

    	$this->visit('/communities')
    		->see('Dubai Marina');
    }

    public function test_a_visitor_can_view_projects_per_community()
    {
    	$community = factory(App\Community::class)->create();
    	$project = factory(App\Project::class)->create();
    	$community->projects()->attach($project);
    	
    	$this->visit(sprintf('/communities/%s', $community->slug))
    		->see($project->name);
    }
}
