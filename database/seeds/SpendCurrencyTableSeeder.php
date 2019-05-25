<?php

use Illuminate\Database\Seeder;

class SpendCurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();
        factory(App\SpendCurrency::class, 10)->create()->each(function($spend_currency) use($users){
            $user = $users[rand(0,count($users) - 1)];
            $spend_currency->users()->associate($user);
            $spend_currency->save();
        });
    }
}
