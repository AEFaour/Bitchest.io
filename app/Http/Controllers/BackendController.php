<?php
namespace App\Http\Controllers;
use App\AgencyCharge;
use App\CryptoCurrency;
use App\CustomerWallet;
use App\SpendCurrency;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class BackendController extends Controller
/***********************************  Controler: display the dashboard *****************************/
{
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
        $spend_currencies = SpendCurrency::where('users_id', '=' , $currentUser->id)->get();
        $cryptos = CryptoCurrency::all();
        $agency_charges = AgencyCharge::all();
        $customer_wallets = CustomerWallet::find($currentUser->id);
        if($currentUser->role == 'Admin'){
            return view('admin.home', compact('currentUser'));
        }else{
            return view('customer.home', compact('currentUser','spend_currencies','customer_wallets', 'cryptos', 'agency_charges'));
        }
    }
    public function showaccount()
    {
        $roles = ['Admin','Customer'];
        $currentUser = Auth::user();
        return view('admin.account', compact('currentUser','roles'));
    }
    public function showcustomers()
    {
        $users = DB::table('users');
        $currentUser = Auth::user();
        $allusers = User::all();
        $customers = User::all()->where('role', '=', 'Customer');
        $admins = User::all()->where('role', '=', 'Admin');
        
        return view('admin.list-customers', compact('currentUser', 'allusers'));
    }
    public function update(Request $request, User $user)
    {
        
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        $request->merge([
            'password' => bcrypt($request->get('password')), 
        ]);
        $user->update($request->all());
        return redirect()->route('account')
                        ->with('success','La mise à jour de votre profil a été faite');
    }
    public function listMonnaie()
    {
        $currentUser = Auth::user();
        $cryptos = CryptoCurrency::get();
        $spend_currencies = SpendCurrency::all();
        $agency_charges = AgencyCharge::all();
        $customer_wallets = CustomerWallet::find($currentUser->id);
        $today = Carbon::today();
        $progression = [];
        /*for($i = 0; $i < count($cryptos) ; $i++ ){
            //dump($cryptos[$i]->id);
            $current_cours = AgencyCharge::where('crypto_currency_id', '=', $cryptos[$i]->id)
            ->where('date', '=', $today)->get();
           $current_coursN1 = AgencyCharge::where('crypto_currency_id', '=', $cryptos[$i]->id)
            ->where('id', '=', $current_cours[0]->id - 1)->get();
            $valeur_charge = $current_cours[0] - $current_coursN1[0];
            //dump($current_cours);
            //dump($current_coursN1);
            //dump($valeur_charge);
            array_push($progression, $valeur_charge);
        }*/
        //dump($progression);
        //dd($cryptos);
        return view('customer.listMonnaie', compact('cryptos', 'spend_currencies','customer_wallets', 'agency_charges', 'progression' , 'currentUser'));
    }
    public function listMonnaieAdmin()
    {
        $currentUser = Auth::user();
        $cryptos = CryptoCurrency::get();
        $spend_currencies = SpendCurrency::all();
        $agency_charges = AgencyCharge::all();
        $customer_wallets = CustomerWallet::find($currentUser->id);
        return view('admin.listMonnaie', compact('cryptos', 'spend_currencies','customer_wallets', 'agency_charges', 'currentUser'));
    }
    public function graphic()
    {
        $currentUser = Auth::user();
        $cryptos = CryptoCurrency::all();
        $agency_charges = AgencyCharge::all();
        $customer_wallets = CustomerWallet::find($currentUser->id);
        return view('customer.graphic', compact('cryptos','agency_charges','customer_wallets', 'currentUser'));
    }
}