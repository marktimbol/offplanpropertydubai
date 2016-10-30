<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageCountriesTest extends TestCase
{
	use DatabaseMigrations;

	protected $user;

	protected function signIn()
	{
    	$this->user = factory(App\User::class)->create();
    	$this->actingAs($this->user);
	}

    public function test_an_admin_can_view_all_the_countries()
    {
    	$this->signIn();

    	$country = factory(App\Country::class)->create();
    	$this->visit('/dashboard/countries')
    		->see($country->name);
    }
}
