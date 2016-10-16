<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitorCanViewAProjectTest extends TestCase
{
	use DatabaseMigrations;

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
