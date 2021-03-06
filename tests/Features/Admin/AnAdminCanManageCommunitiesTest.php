<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;

class AnAdminCanManageCommunitiesTest extends TestCase
{
	use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

	public function test_an_admin_can_view_community()
	{
		$community = factory(App\Community::class)->create();
		$url = sprintf('/dashboard/cities/%s/communities/%s', $community->city->id, $community->id);
		$this->visit($url)
			->see($community->name);
	}

    public function test_an_admin_can_store_community_to_a_city()
    {
    	$city = factory(App\City::class)->create([
    		'name'	=> 'Dubai',
    		'slug'	=> 'dubai'
    	]);

    	$url = sprintf('/dashboard/cities/%s/communities', $city->id);
    	$this->visit($url)
    		->type('Dubai Marina', 'name')
    		->type('Lorem ipsum', 'description')
    		->press('Save Community')

    		->seeInDatabase('communities', [
    			'city_id'	=> $city->id,
    			'name'	=> 'Dubai Marina',
    			'description'	=> 'Lorem ipsum'
    		]);
    }

    public function test_an_admin_can_update_community()
    {
        $city = factory(App\City::class)->create([
            'name'  => 'Dubai',
            'slug'  => 'dubai'
        ]);

        $community = factory(App\Community::class)->create([
            'city_id'   => $city->id,
            'name'  => 'Dubai Marinas',
        ]);

        $url = sprintf('/dashboard/cities/%s/communities/%s', $city->id, $community->id);
        $this->visit($url)
            ->type('Dubai Marina', 'name')
            ->type('Lorem ipsum', 'description')
            ->press('Update Community')

            ->seeInDatabase('communities', [
                'city_id'   => $city->id,
                'name'  => 'Dubai Marina',
                'description'   => 'Lorem ipsum'
            ]);
    }
}
