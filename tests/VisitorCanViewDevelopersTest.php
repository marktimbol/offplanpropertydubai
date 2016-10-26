<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitorCanViewDevelopersTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_visitor_can_view_all_the_developers()
    {
    	$developer = factory(App\Developer::class)->create([
    		'name'	=> 'Emaar'
    	]);

    	$this->visit('/developers')
    		->see('Emaar');
    }

    public function test_a_visitor_can_view_a_developer()
    {
    	$developer = factory(App\Developer::class)->create([
    		'name'	=> 'Emaar'
    	]);

    	$this->visit(sprintf('/developers/%s', $developer->slug))
    		->see('Emaar');	
    }

    public function test_a_visitor_can_see_how_many_projects_are_in_a_developer()
    {
        $developer = factory(App\Developer::class)->create([
            'name'  => 'Emaar'
        ]);

        factory(App\Project::class, 10)->create([
            'developer_id'  => $developer->id
        ]);

        $this->visit('/developers')
            ->see($developer->name)
            ->see('10 Projects'); 
    }
}
