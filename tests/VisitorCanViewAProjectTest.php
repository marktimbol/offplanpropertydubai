<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitorCanViewAProjectTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_visitor_can_view_a_specific_project()
    {
        $developer = factory(App\Developer::class)->create([
            'name'  => 'Emaar'
        ]);

    	$project = factory(App\Project::class)->make([
    		'name'	=> 'Villa Nova',
    		'slug'	=> 'villa-nova'
    	]);

        $developer->projects()->save($project);

    	$this->visit(sprintf('/developers/%s/projects/%s', $developer->slug, $project->slug))
    		->see('Villa Nova');
    }
}
