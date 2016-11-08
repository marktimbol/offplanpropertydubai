<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagesTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_visitor_can_visit_homepage()
    {
    	$this->visit('/')
    		->see('Off Plan Property Dubai');
    }
}
