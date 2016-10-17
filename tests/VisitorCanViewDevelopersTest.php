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
}
