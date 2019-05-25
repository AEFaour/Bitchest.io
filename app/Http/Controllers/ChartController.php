<?php
namespace App\Http\Controllers;
use App\AgencyCharge;
use App\CryptoCurrency;
use App\CustomerWallet;
use App\SpendCurrency;
use App\User;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class ChartController extends Controller
{
    /*******************************************  controller: display the graphics  ***********************************/
    public function index()
    {
        $currentUser = Auth::user();
        $customer_wallet= CustomerWallet::find($currentUser->id);
        $cryptos = CryptoCurrency::all();
        $valeurId = 1;
        $agency_charges = AgencyCharge::where('crypto_currency_id', '=', $valeurId)->get();
        $dataCrypto = [];
        $date = [];
        for($i = 0; $i < count($agency_charges); $i++){
            array_push($dataCrypto, $agency_charges[$i]->charge);
        }
        for($j = 0; $j < count($agency_charges); $j++){
            array_push($date, $agency_charges[$j]->date);
        }
        $cryptoValue = CryptoCurrency::find($valeurId);
        $chart = Charts::create('line', 'highcharts')
            ->Title('graphique')
            ->Labels($date)
            ->Values($dataCrypto)
            ->Dimensions(1000,500)
            ->Responsive(false);
        return view('customer.chart',compact('chart','cryptoValue','valeurId', 'agency_charges', 'currentUser','cryptos', 'customer_wallet'));
    }
    public function showCrypto(CryptoCurrency $crypto)
    {
        $currentUser = Auth::user();
        $customer_wallet = CustomerWallet::find($currentUser->id);
        $cryptos = CryptoCurrency::all();
        $valeurId = $crypto->id;
        $agency_charges = AgencyCharge::where('crypto_currency_id', '=', $valeurId)->get();
        $dataCrypto = [];
        $date = [];
        for($i = 0; $i < count($agency_charges); $i++){
            array_push($dataCrypto, $agency_charges[$i]->charge);
        }
        for($j = 0; $j < count($agency_charges); $j++){
            array_push($date, $ragency_charges[$j]->date);
        }
        $cryptoValue = CryptoCurrency::find($valeurId);
        $chart = Charts::create('line', 'highcharts')
            ->Title('graphique')
            ->Labels($date)
            ->Values($dataCrypto)
            ->Dimensions(1000,500)
            ->Responsive(false);
        return view('customer.chart',compact('chart','cryptoValue','agency_charges','valeurId', 'currentUser','cryptos', 'customer_wallet'));
    }
    public function buyCrypto(CryptoCurrency $crypto)
    {
        $currentUser = Auth::user();
        return view('customer.buy',compact('currentUser','crypto'));
    }
    public function confirmBuyCrypto(Request $request, CryptoCurrency $crypto)
    {
        $today = Carbon::today();
        $currentUser = Auth::user();
        //$date = new DateTime();
       
        $current_cours = AgencyCharge::where('crypto_currency_id', '=', $crypto->id)
                ->where('date', '=', $today)->get();
        //dd($current_cours);
        $euro_valeur = $request->quantity * $current_cours[0]->charge;
        dump($euro_valeur);
        //dd($current_cours);
       
        /*
        $request= [
            'crypto_currency_id' => $crypto->id,
            'users_id' => $currentUser->id,
            'purchase_date' => $today->format('Y-m-d'),
            'quantity' => $request->quantity,
            'euro_valeur' => $euro_valeur,
            'agency_charge_id' => $crypto->id
        ];*/
        $request->request->add([
            'crypto_currency_id' => $crypto->id,
            'users_id' => $currentUser->id,
            'purchase_date' => $today->format('Y-m-d'),
            'euro_valeur' => $euro_valeur,
            'agency_charge_id' => $current_cours[0]->id,
            'quantity' => $request->quantity,
        ]);
        //dd($request);
        request()->validate([
            'crypto_currency_id' => 'required',
            'users_id' => 'required',
            'purchase_date' => 'required',
            'quantity' => 'required',
            'euro_valeur' => 'required',
            'agency_charge_id' => 'required',
        ]);
        //dd($request);
        SpendCurrency::create($request->all());
        return redirect()->route('listMonnaie')->with('Success','Votre achat a bien été effectué');
    }
    
}