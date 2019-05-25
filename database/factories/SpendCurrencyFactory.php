<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\SpendCurrency;
use Faker\Generator as Faker;

$factory->define(SpendCurrency::class, function (Faker $faker) {
    return [
        'purchase_date' => $faker->date('Y-m-d'),
        'quantity' => $faker->numberBetween($min=1, $max= 10),
        'euro_valeur' => $faker->numberBetween($min=1, $max=500),
        'active'  => $faker->boolean($chanceOfGettingTrue = 50),
        'crypto_currency_id' => $faker->numberBetween($min=1, $max=10),
        'users_id' => $faker->numberBetween($min=1, $max=5)
    ];
});
