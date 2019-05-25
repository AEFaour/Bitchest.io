<?php

use Illuminate\Database\Seeder;

class CustomerWalletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CustomerWallet::class, 20)->create();
    }
}
