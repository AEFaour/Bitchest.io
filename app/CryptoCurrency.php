<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CryptoCurrency extends Model
{
    
    public $table = "crypto_currencies";
    protected $fillable = [
        'name','valeur',
    ];
    public function spend_currencies()
    {
        return $this->hasOne(SpendCurrency::class);
    }
    public function agency_charges()
    {
        return $this->hasMany(AgencyCharge::class);
    }
    public function getCoursActuel()
    {
        $cours =  DB::table('agency_charges')
            ->select('charge')
            ->orderBy('date', 'desc')
            ->where('crypto_currency_id', '=', $this->id)
            ->first();
        return $cours;
    } 
}
