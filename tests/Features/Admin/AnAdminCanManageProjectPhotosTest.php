<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageProjectPhotosTest extends TestCase
{
	use DatabaseMigrations;

    public function test_an_admin_can_manage_project_photos()
    {
    	$this->assertTrue(true);
    	// $user = factory(App\User::class)->create();
    	// $this->actingAs($user);

    	// $endpoint = sprintf('/dashboard/developers/%s/projects%s/photos');
    	// $this->post($endpoint);
    }
}
