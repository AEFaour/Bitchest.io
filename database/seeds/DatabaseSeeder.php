<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(AgencyChargeTableSeeder::class); 
        $this->call(CryptoCurrencyTableSeeder::class);
        $this->call(CustomerWalletTableSeeder::class); 
        $this->call(SpendCurrencyTableSeeder::class);
    }
}
