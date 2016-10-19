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
        'profile' => $faker->paragraph,
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
        'country'   => $faker->country,
        'city'   => $faker->city,
        'community'   => $faker->state,
        'latitude'  => $faker->latitude,
        'longitude' => $faker->longitude,
        'dld_project_completion_link'   => $faker->url,
        'project_escrow_account_details_link'   => $faker->url,
        'description'   => $faker->paragraph,
    ];
});
