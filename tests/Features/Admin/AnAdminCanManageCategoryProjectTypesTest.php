<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageCategoryProjectTypesTest extends TestCase
{
	use DatabaseMigrations;

    public function test_an_admin_can_store_category_project_types()
    {
    	$user = factory(App\User::class)->create();
    	$this->actingAs($user);

    	$category = factory(App\Category::class)->create();
    	$url = sprintf('/dashboard/categories/%s/types', $category->id);

    	$this->visit($url)
    		->type('Studio', 'name')
    		->press('Save Project Type')

    		->seeInDatabase('types', [
    			'category_id'	=> $category->id,
    			'name'	=> 'Studio'
    		]);
    }

    public function test_an_admin_can_delete_category_project_type()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);

        $category = factory(App\Category::class)->create();
        $type = factory(App\Type::class)->create([
            'category_id'   => $category->id
        ]);

        $endpoint = sprintf('/dashboard/categories/%s/types/%s', $category->id, $type->id);
        $this->delete($endpoint);

        $this->dontSeeInDatabase('types', [
            'id'    => $type->id
        ]);

    }
}
