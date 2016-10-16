<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitorCanViewAProjectTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_visitor_can_view_projects_on_the_homepage()
    {
        $project = factory(App\Project::class)->create([
            'name'  => 'Villa Nova'
        ]);

        $this->visit('/')
            ->see('Villa Nova');
    }

    public function test_a_visitor_can_view_all_the_developers_on_the_homepage()
    {
        $developers = factory(App\Developer::class, 5)->create();

        $this->visit('/');

        foreach( $developers as $developer )
        {
            $this->see($developer->name);  
        }
    }

    public function test_a_visitor_can_view_a_specific_project()
    {
    	$project = factory(App\Project::class)->create([
    		'name'	=> 'Villa Nova',
    		'slug'	=> 'villa-nova'
    	]);

    	$this->visit(sprintf('/projects/%s', $project->slug))
    		->see('Villa Nova');
    }
}
