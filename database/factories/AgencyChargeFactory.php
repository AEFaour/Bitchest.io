<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\AgencyCharge;
use Faker\Generator as Faker;

$factory->define(AgencyCharge::class, function (Faker $faker) {
    return [
        'crypto_currency_id' => $faker->numberBetween($min=1, $max=10),
        'date' => $faker->date('Y-m-d'),
        'spend_currency_id'=>$faker->numberBetween($min=1, $max=10),
        'charge' => 0
    ];
});
