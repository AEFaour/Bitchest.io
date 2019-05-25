<?php
namespace App\Http\Controllers;
use App\AgencyCharge;
use App\CryptoCurrency;
use App\CustomerWallet;
use App\SpendCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class SpendCurrencyController extends Controller
{
/**************************** Controller: display the spends *************************/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        $spend_currencies = SpendCurrency::where('users_id', '=' , $currentUser->id)
        ->where('active', '=', 1)->get();        
        $customer_wallet = CustomerWallet::find($currentUser->id);
        
        $cryptos = CryptoCurrency::all();
        $agency_charges = AgencyCharge::all();
        return view('customer.wallet', compact('currentUser','spend_currencies','customer_wallet', 'cryptos', 'agency_charges'));
    }
    public function showHistorique() {
        $currentUser = Auth::user();
        $spend_currencies = SpendCurrency::where('users_id', '=' , $currentUser->id)->orderBy('purchase_date', 'desc')->get();
        $purchases = SpendCurrency::where('users_id', '=' , $currentUser->id)
        ->where('active', '=', 1)->orderBy('purchase_date', 'desc')->get();
        $sells = SpendCurrency::where('users_id', '=' , $currentUser->id)
        ->where('active', '=', 0)->orderBy('purchase_date', 'desc')->get();
        $customer_wallet = CustomerWallet::find($currentUser->id);
        $cryptos = CryptoCurrency::all();
        $agency_charges = AgencyCharge::all();
        $status = ['Vendue','Validée'];
        return view('customer.historique', compact('currentUser','spend_currencies','customer_wallet', 'cryptos', 'agency_charges', 'status', 'purchases', 'sells'));
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
     * @param  \App\SpendCurrency  $spend_currencies
     * @return \Illuminate\Http\Response
     */
    public function show(SpendCurrency $spend_currency)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SpendCurrency  $spend_currencies
     * @return \Illuminate\Http\Response
     */
    public function edit(SpendCurrency $Spend_currency)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SpendCurrency $spend_currencies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpendCurrency $Spend_currency)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SpendCurrency  $spend_currency
     * @return \Illuminate\Http\Response
     */
    public function displaySpendCurrency(SpendCurrency $spend_currency)
    {
        $euro_valeur = $spend_currency->euro_valeur;
        
        $customer_wallet = CustomerWallet::find($spend_currency->users_id); // a voir pour le S a la fin de user_id
        $customer_wallet->euro_balance += $euro_valeur;
        $customer_wallet->save();
        
        $spend_currency->active = 0;
        $spend_currency->save();
        SpendCurrency::destroy($spend_currency->id);
        return back()->with('successMessage','Merci pour votre action, le vente est reussi!');
    }
    
    public function destroy(SpendCurrency $spend_currency)
    {
        $euro_valeur = $spend_currency->euro_valeur;
        
        $customer_wallet = CustomerWallet::find($spend_currency->users_id); // a voir pour le S a la fin de user_id
        $customer_wallet->euro_balance += $euro_valeur;
        $customer_wallet->save();
        SpendCurrency::destroy($spend_currencies->id);
        return redirect()->route('customer_wallets')
        ->with('success','Merci pour votre action, le vente est reussi!');
    }
    public function buyCrypto(CryptoCurrency $crypto)
    {
        $currentUser = Auth::user();
        return view('customer.buy', compact('currentUser','crypto'));
    }
    public function confirmBuyCrypto(Request $request, CryptoCurrency $crypto)
    {
        $today = Carbon::today();
        $currentUser = Auth::user();
        $customer_wallet = CustomerWallet::find($currentUser->id);
        $current_cours = AgencyCharge::where('crypto_currency_id', '=', $crypto->id)
                ->where('date', '=', $today)->get();
        
        $euro_valeur = $request->quantity * $crypto->id;
        
        if( $customer_wallet->euro_balance - $euro_valeur < 0){
            return back()->with('errorMessage','Votre solde \' est pas assez, vous ne pourriez pas faire l\'achat');
        }
        $request->request->add([
            'crypto_currency_id' => $crypto->id,
            'users_id' => $currentUser->id,
            'purchase_date' => $today->format('Y-m-d'),
            'euro_valeur' => $euro_valeur,
            'active' => 1,
            'agency_charge_id' => $crypto,
            'quantity' => $request->quantity,
        ]);
    
        request()->validate([
            'crypto_currency_id' => 'required',
            'users_id' => 'required',
            'purchase_date' => 'required',
            'quantity' => 'required',
            'euro_valeur' => 'required',
            'agency_charge_id' => 'required',
        ]);
        
        $customer_wallet->euro_balance -= $euro_valeur;
        $customer_wallet->save();
        
        SpendCurrency::create($request->all());
        return redirect()->route('listMonnaie')->with('successMessage','Merci pour votre action, le vente est reussi');
    }
}