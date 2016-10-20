<?php

use App\Category;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Mark Timbol',
            'email' => 'mark@timbol.com',
            'password'  => bcrypt('marktimbol')
        ]);

        $developer = factory(App\Developer::class)->create([
            'name'  => 'Dubai Properties',
            'slug'  => 'dubai-properties'
        ]);
        $project = factory(App\Project::class)->make([
            'developer_id'  => $developer->id,
            'name'  => 'Villanova',
            'title' => 'The Villanova',
            'slug'  => 'the-villanova'
        ]);
        $developer->projects()->save($project);

        $categories = [
            'Residential' => [
                'name'  => 'Residential',
                'types' => [
                    'Studio', 'Apartment', 'Villa', 'Townhouse', 'Penthouse', 'Duplex', 'Loft', 'Residential Land'
                ]
            ],

            'Commercial' => [
                'name'  => 'Commercial',
                'types' => [
                    'Office', 'Retail', 'Restaurants', 'Commercial Land',
                ]
            ],

            'Hospitality' => [
                'name'  => 'Hospitality',
                'types' => [
                    'Serviced Studio', 'Serviced Apartments', 'Hotel Room', 'Hotel Apartment'
                ]
            ],

            'Mixed Use' => [
                'name'  => 'Mixed Use',
                'types' => [
                    'Residential', 'Commercial'
                ]
            ]
        ];

        foreach( $categories as $category )
        {
            $categoryInstance = Category::create([
                'name'  => $category['name']
            ]);

            foreach( $category['types'] as $key => $type )
            {
                $categoryInstance->types()->create([
                    'name'  => $type
                ]);
            }
        }
    }
}
