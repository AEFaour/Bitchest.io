<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SpendCurrency extends Model
{
    
    protected $fillable = [
        'crypto_currency_id','users_id', 'agency_charge_id',
        'purchase_date','quantity','euro_valeur','active',
        
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function crypto_currencies()
    {
        return $this->belongsTo(CryptoCurrency::class);
    }
    public function agency_charges()
    {
        return $this->belongsTo(AgencyCharge::class);
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
