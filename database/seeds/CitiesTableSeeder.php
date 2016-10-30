<?php

use App\City;
use App\Country;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::whereSlug('united-arab-emirates')->first();

        City::create([
        	'country_id'	=> $country->id,
        	'name'	=> 'Dubai',
        	'slug'	=> 'dubai'
        ]);
    }
}
