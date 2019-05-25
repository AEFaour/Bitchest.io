<?php

use Illuminate\Database\Seeder;

class AgencyChargeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /**
     * Returns the valeur of  place on the market of the cryptocurrency
     * @param $cryptoname {string} the name of the cryptocurrency
     */
    function getFirstCotation($cryptoname){
        return ord(substr($cryptoname,0,1)) + rand(0, 10);
    }    
    /**
     * Returns the cryptocurrency quote variation on a day
     * @param $cryptoname {string} the name of the cryptocurrency
     */
        function getCotationFor($cryptoname){
            return ((rand(0, 99)>40) ? 1 : -1) * ((rand(0, 99)>49) ? ord(substr($cryptoname,0,1)) : ord(substr($cryptoname,-1))) * (rand(1,10) * .01);
        }
        $cryptos = App\CryptoCurrency::all();
        foreach ($cryptos as $crypto)
        {
            $crypto_base = $crypto->valeur;
            for ($j = 0; $j < 30; $j++)
            {
                $date = new DateTime();
                $agency_charge = factory(App\AgencyCharge::class, 1)->create();
                $cryptoname = $crypto->name;
                $crypto_base +=  ((rand(0, 99)>40) ? 1 : -1) * ((rand(0, 99)>49) ? ord(substr($cryptoname,0,1)) : ord(substr($cryptoname,-1))) * (rand(1,10) * .01);
                if ($crypto_base < 0 )  $crypto_base = 0;
                $agency_charge[0]->charge = $crypto_base;
                $agency_charge[0]->date = $date->modify('-'.(29 - $j).'days')->format('Y-m-d');
                $crypto->agency_charges()->save($agency_charge[0]);
                }
        };
    }
}
