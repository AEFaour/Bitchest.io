<?php

use Illuminate\Database\Seeder;

class CryptoCurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('crypto_currencies')->insert(array(
            [
                'name' => 'Bitcoin',
                'valeur' => ord(substr('Bitcoin',0,1)) + rand(0, 10) // In the ordre of the document.
            ],
            [
                'name' => 'Ethereum',
                'valeur' => ord(substr('Ethereum',0,1)) + rand(0, 10)
            ],
            [
                'name' => 'Ripple',
                'valeur' => ord(substr('Ripple',0,1)) + rand(0, 10)
            ],
            [
                'name' => 'Bitcoin Cash',
                'valeur' => ord(substr('Bitcoin Cash',0,1)) + rand(0, 10)
            ],
            [
                'name' => 'Cardano',
                'valeur' => ord(substr('Cardano',0,1)) + rand(0, 10)
            ],
            [
                'name' => 'Litecoin',
                'valeur' => ord(substr('Litecoin',0,1)) + rand(0, 10)
            ],
            [
                'name' => 'NEM',
                'valeur' => ord(substr('NEM',0,1)) + rand(0, 10)
            ],
            [
                'name' => 'Stellar',
                'valeur' => ord(substr('Stellar',0,1)) + rand(0, 10)
            ],
            [
                'name' => 'IOTA',
                'valeur' => ord(substr('IOTA',0,1)) + rand(0, 10)
            ],
            [
                'name' => 'Dash',
                'valeur' => ord(substr('Dash',0,1)) + rand(0, 10)
            ],
        ));
    }
}
