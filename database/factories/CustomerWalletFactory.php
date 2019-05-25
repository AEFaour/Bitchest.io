<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\CustomerWallet;
use Faker\Generator as Faker;

$factory->define(CustomerWallet::class, function (Faker $faker) {
    return [
        'users_id' => $faker->numberBetween(1, 5),
        'crypto_currency_id' => $faker->numberBetween(1, 10),
        'euro_balance' => $faker->numberBetween(1, 500)
    ];
});
