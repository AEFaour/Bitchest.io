<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerWallet extends Model
{
    public $table = "customer_wallets";
    protected $fillable = [ 
        'users_id','crypto_currency_id','euro_balance',
    ];
    public function users() 
    {
        return $this->hasOne(User::class); 
    }
    public function crypto_currencies() 
    {
        return $this->belongsTo(CryptoCurrency::class);
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
