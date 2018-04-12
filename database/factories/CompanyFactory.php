
<?php
use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name'            => $faker->firstName,
        'description'     => $faker->realText(),
        'website'         => $faker->url,
        'year_founded'    => $faker->year,
        'address_line1'   => $faker->streetAddress,
        'address_line2'   => null,
        'address_city'    => $faker->city,
        'address_state'   => $faker->stateAbbr,
        'address_country' => 'USA',
        'address_zip'     => $faker->postcode,
    ];
});