<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageCategoryTest extends TestCase
{
	use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_an_admin_can_view_all_the_available_categories()
    {
    	$category = factory(App\Category::class)->create();
    	$this->visit('/dashboard/categories')
    		->see($category->name);
    }

    public function test_an_admin_can_store_category()
    {
    	$this->visit('/dashboard/categories')
    		->type('Residential', 'name')
    		->press('Save Category')

    		->seeInDatabase('categories', [
    			'name'	=> 'Residential'
    		]);
    }

    public function test_an_admin_can_remove_category()
    {
        config(['translatable.locale' =>  'ar']);

        $category = factory(App\Category::class)->create([
            'name'  => 'Residential',
            'description:en'   => 'The residential in english',
            'description:ar'   => 'The residential in arabic',
        ]);

        $this->seeInDatabase('categories', [
            'id'    => 1,
            'name'  => 'Residential',
        ])
            ->seeInDatabase('category_translations', [
                'category_id'   => 1,
                'locale'    => 'en',
                'description'   => 'The residential in english'
            ])
            ->seeInDatabase('category_translations', [
                'category_id'   => 1,
                'locale'    => 'ar',
                'description'   => 'The residential in arabic'
            ]);            

        $endpoint = sprintf('/dashboard/categories/%s', $category->id);
        $this->delete($endpoint);

        $this->dontSeeInDatabase('categories', [
            'id'    => $category->id
        ]);
    }
}
