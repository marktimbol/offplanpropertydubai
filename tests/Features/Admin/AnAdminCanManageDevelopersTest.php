<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageDevelopersTest extends TestCase
{
	use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_an_admin_can_view_all_the_developers()
    {
    	$developer = factory(App\Developer::class)->create();

    	$this->visit('/dashboard/developers')
    		->see($developer->name);
    }

    public function test_an_admin_can_add_a_developer()
    {
        $country = factory(App\Country::class)->create();
        $response = $this->post('/dashboard/developers', [
            'country_id'    => $country->id,
            'name'  => 'Emaar',
            'slug'  => 'emaar',
            'profile'   => 'The profile',
            'website'   => 'http://google.com'
        ]);

		$this->seeInDatabase('developers', [
            'country_id'  => 1,
            // 'name'  => 'Emaar',
            'slug'  => 'emaar',
            'website'   => 'http://google.com',
            // 'profile'   => 'The profile',
		])
            ->seeInDatabase('developer_translations', [
                'developer_id'  => 1,
                'locale'    => 'en',
                'name'  => 'Emaar',
                'profile'   => 'The profile'
            ]);
    }

    public function test_an_admin_can_update_a_developer_information()
    {
        $uae = factory(App\Country::class)->create([
            'name'  => 'UAE'
        ]);
        
        $usa = factory(App\Country::class)->create([
            'name'  => 'USA'
        ]);

        $developer = factory(App\Developer::class)->create([
            'country_id'    => $uae->id,
            'name'  => 'Emaars',
            'website'   => 'http://googles.com'
        ]);

        $this->visit(sprintf('/dashboard/developers/%s/edit', $developer->id))
            ->select($usa->id, 'country_id')
            ->type('Emaar', 'name')
            ->type('New Profile', 'profile')
            ->type('http://google.com', 'website')
            ->press('Update')

            ->seeInDatabase('developers', [
                'id'    => $developer->id,
                'country_id'    => $usa->id,
                // 'name'  => 'Emaar',
                'website'   => 'http://google.com',
                // 'profile'   => 'New Profile',
            ])
                ->seeInDatabase('developer_translations', [
                    'developer_id'  => $developer->id,
                    'locale'    => 'en',
                    'name'  => 'Emaar',
                    'profile'   => 'New Profile'
                ]);
    }

    public function test_an_admin_can_delete_a_developer()
    {
        $developer = factory(App\Developer::class)->create();

        $this->visit(sprintf('/dashboard/developers/%s', $developer->id))
            ->see($developer->name)
            ->press('Delete Developer')
            ->dontSeeInDatabase('developers', [
                'id'    => $developer->id
            ]);
    }

}
