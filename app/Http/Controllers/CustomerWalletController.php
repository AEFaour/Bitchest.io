<?php
namespace App\Http\Controllers;
use App\AgencyCharge;
use App\CryptoCurrency;
use App\CustomerWallet;
use App\SpendCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerWalletController extends Controller
{
    /*************************************************Controller: display the wallets  **********************/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        $spend_currencies = SpendCurrency::where('users_id', '=' , $currentUser->id)
        ->where('active', '=', '1')
        ->get();
        
        $customer_wallets = CustomerWallet::find($currentUser->id); // a voir pour mettre un S a $customer_wallets
        
        //$walletCryptos = CustomerWallet::find($currentUser->id);
        $cryptos = CryptoCurrency::all();
        $agency_charges = AgencyCharge::all();
        return view('customer.wallet', compact('currentUser','spend_currencies','customer_wallets', 'cryptos', 'agency_charges'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerWallet  $customer_wallets
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerWallet $customer_wallets)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerWallet  $customer_wallets
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerWallet $customer_wallets)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerWallet  $customer_wallets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $customer_wallets)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerWallet $customer_wallets
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerWallet $customer_wallets)
    {
        //SpendCurrency::destroy($spend_currencies->id);
        return redirect()->route('CustomerWallet')
        ->with('success','Merci pour votre action, le vente est reussi.');
    }
}