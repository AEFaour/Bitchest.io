<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgencyCharge extends Model
{
    public $table = "agency_charges";
    protected $fillable = [
        'crypto_currency_id', 'date', 'charge',
    ];
    public function crypto_currencies()
    {
        return $this->belongsTo(CryptoCurrency::class);
    }
}
