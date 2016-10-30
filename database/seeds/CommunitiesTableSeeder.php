<?php

use App\City;
use App\Community;
use Illuminate\Database\Seeder;

class CommunitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = City::whereSlug('dubai')->first();

        Community::create([
        	'city_id'	=> $city->id,
        	'name'	=> 'Dubai Marina',
        	'slug'	=> 'dubai-marina'
        ]);

        Community::create([
        	'city_id'	=> $city->id,
        	'name'	=> 'Al Barsha',
        	'slug'	=> 'al-barsha'
        ]);
    }
}
