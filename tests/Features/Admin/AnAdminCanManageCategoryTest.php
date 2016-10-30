<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageCategoryTest extends TestCase
{
	use DatabaseMigrations;

    public function test_an_admin_can_view_all_the_available_categories()
    {
    	$user = factory(App\User::class)->create();
    	$this->actingAs($user);

    	$category = factory(App\Category::class)->create();
    	$this->visit('/dashboard/categories')
    		->see($category->name);
    }

    public function test_an_admin_can_store_category()
    {
    	$user = factory(App\User::class)->create();
    	$this->actingAs($user);

    	$this->visit('/dashboard/categories')
    		->type('Residential', 'name')
    		->press('Save Category')

    		->seeInDatabase('categories', [
    			'name'	=> 'Residential'
    		]);
    }

    public function test_an_admin_can_remove_category()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);

        $category = factory(App\Category::class)->create();

        $endpoint = sprintf('/dashboard/categories/%s', $category->id);
        $this->delete($endpoint);

        $this->dontSeeInDatabase('categories', [
            'id'    => $category->id
        ]);
    }
}
