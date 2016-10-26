<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitorCanViewAllTheCommunitiesTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_visitor_can_view_all_the_available_communities()
    {
    	$community = factory(App\Community::class)->create();
    	
    	$this->visit('/communities')
    		->see($community->name);
    }
}
