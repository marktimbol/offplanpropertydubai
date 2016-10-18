<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DashboardTest extends TestCase
{
	use DatabaseMigrations;

    public function test_an_authenticated_user_can_visit_dashboard()
    {
    	$user = factory(App\User::class)->create();
    	$this->actingAs($user);

    	$this->visit('/dashboard')
    		->see('Dashboard');
    }
}
