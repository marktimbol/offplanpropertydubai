<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$country = factory(App\Country::class)->create([
    		'name'	=> 'United Arab Emirates',
            'slug'  => 'united-arab-emirates'
    	]);

        $city = factory(App\City::class)->make([
            'country_id'    => $country->id,
            'name'  => 'Dubai',
            'slug'  => 'dubai'
        ]);
        $country->cities()->save($city);

        $community = factory(App\Community::class)->make([
            'city_id'   => $city->id,
            'name'  => 'Dubai Marina',
            'slug'  => 'dubai-marina'
        ]);
        $city->communities()->save($community);
    }
}
