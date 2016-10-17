<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RedirectUserIfUnauthenticatedTest extends TestCase
{
	use DatabaseMigrations;
	
	public function test_redirect_user_to_login_page_if_they_are_unauthenticated()
	{ 
		$this->visit('/dashboard')
			->seePageIs('/login');
	}
}
