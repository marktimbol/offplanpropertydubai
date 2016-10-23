<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

            foreach( $category['types'] as $type )
            {
                $categoryInstance->types()->create([
                    'name'  => $type
                ]);
            }
        }
    }
}
