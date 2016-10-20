<?php

use App\ProjectType;
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

        $projectTypes = [
            'Residential' => [
                'name'  => 'Residential',
                'categories' => [
                    'Studio', 'Apartment', 'Villa', 'Townhouse', 'Penthouse', 'Duplex', 'Loft', 'Residential Land'
                ]
            ],

            'Commercial' => [
                'name'  => 'Commercial',
                'categories' => [
                    'Office', 'Retail', 'Restaurants', 'Commercial Land',
                ]
            ],

            'Hospitality' => [
                'name'  => 'Hospitality',
                'categories' => [
                    'Serviced Studio', 'Serviced Apartments', 'Hotel Room', 'Hotel Apartment'
                ]
            ],

            'Mixed Use' => [
                'name'  => 'Mixed Use',
                'categories' => [
                    'Residential', 'Commercial'
                ]
            ]
        ];

        foreach( $projectTypes as $key => $projectType )
        {
            $type = ProjectType::create([
                'name'  => $projectType['name']
            ]);

            foreach( $projectType['categories'] as $category )
            {
                $type->subcategories()->create([
                    'name'  => $category
                ]);
            }
        }
    }
}
