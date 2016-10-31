<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageCountriesTest extends TestCase
{
	use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }
    
    public function test_an_admin_can_view_all_the_countries()
    {
    	$country = factory(App\Country::class)->create();
    	$this->visit('/dashboard/countries')
    		->see($country->name);
    }
}
