<?php

namespace App\Http\Controllers;

use App\AgencyCharge;
use App\CryptoCurrency;
use App\CustomerWallet;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SpendCurrency;

class HomeController extends Controller
{

    /****************************     Controller display the general concept     ****************/
    


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        $allusers = User::all();
        $spend_currencies = SpendCurrency::all();
        $cryptos = CryptoCurrency::all();
        $agency_charges = AgencyCharge::all();
        $customer_wallets = CustomerWallet::find($currentUser->id);
        $today = Carbon::today(); // permet de generer les dates 
        $progression = [];
        //dd($spend_currencies);
       /*for($i = 0; $i < count($cryptos) ; $i++ ){

            $current_cours = AgencyCharge::where('crypto_currency_id', '=', $cryptos[$i]->id)
                ->where('date', '=', $today)->get();

            $current_coursN1 = AgencyCharge::where('crypto_currency_id', '=', $cryptos[$i]->id)
                ->where('id', '=', $current_cours[$i]->id - 1)->get();
            $valeur_charge = $current_cours[$i]->charge - $current_coursN1[$i]->charge;

            array_push($progression, $valeur_charge);
       }*/

        if($currentUser->role == 'Admin'){
        return view('admin.home', compact('currentUser', 'cryptos', 'allusers','spend_currencies', 'agency_charges', 'allusers'));
        }else{
            return view('customer.home', compact('currentUser','spend_currencies','customer_wallets', 'cryptos', 'agency_charges', 'progression'));
        }
        
    }
}
