<?php
use DB ;
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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Application::class, function (Faker\Generator $faker) {
    $users_ids = DB::table('users')->select('id')->get() ;
    $user_id = $faker->randomElement($users_ids)->id ;
    return [
        'applicationNumber' => $user_id,
        'applicationType' => 'ACT',
        'applicationStatus' => 1,
        'contractors_idcontractors' => str_random(10),
    ];
});
