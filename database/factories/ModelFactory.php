<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Developer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->slug,
        'country' => $faker->country,
        'website' => $faker->url,
        'profile' => $faker->realText,
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'developer_id'  => function() {
            return factory(App\Developer::class)->create()->id;
        },
        'name' => $faker->word,
        'title' => $faker->sentence,
        'slug' => $faker->slug,
        'country'   => 'United Arab Emirates',
        'city'   => 'Dubai',
        'community'   => 'Dubai Marina',
        'latitude'  => $faker->latitude,
        'longitude' => $faker->longitude,
        'expected_completion_date'   => 'February 2019',
        'dld_project_completion_link'   => 'http://google.com',
        'project_escrow_account_details_link'   => 'http://hotmail.com',
        'description'   => $faker->realText,
    ];
});

$factory->define(App\Payment::class, function (Faker\Generator $faker) {
    return [
        'project_id'  => function() {
            return factory(App\Project::class)->create()->id;
        },
        'title' => $faker->sentence,
        'percentage' => '10%',
        'date' => 'Purchase Date',
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Type::class, function (Faker\Generator $faker) {
    return [
        'category_id'  => function() {
            return factory(App\Category::class)->create()->id;
        },
        'name' => $faker->word,
    ];
});
