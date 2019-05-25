<?php

namespace App;

use Illuminate\Notifications\Notifiable;
/*use Illuminate\Contracts\Auth\MustVerifyEmail;*/
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function spend_currencies()
    {
        return $this->hasMany(SpendCurrency::class);
    }
    public function customer_wallets()
    {
        return $this->hasOne(CustomerWallet::class);
    }
    public function agency_charges()
    {
        return $this->hasOne(AgencyCharge::class);
    }
}
