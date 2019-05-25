<?php
namespace App\Http\Controllers;
use App\User;
use App\CustomerWallet;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
class CustomerController extends Controller
{
    /*******************************************     Controller: display the Customers ***********************/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $currentUser = Auth::user();
        $user = User::find($user);
        $roles = ['Admin','Customer'];
        return view('admin.customer.edit', compact('user','roles','currentUser'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentUser = Auth::user();
        $roles = ['Admin','Customer'];
        
        return view('admin.customer.create', compact('currentUser','roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        $request->merge([
            'password' => hash::make($request->get('password')), // Helper function for Hash::make
        ]);
        User::create($request->all());
        //Portefeuille::create($request->all());
            
        return redirect()->route('customers')->with('success','Member is created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $currentUser = Auth::user();
        $user = User::find($user);
        $roles = ['Admin','Customer'];
        $customer_wallets = CustomerWallet::find($user)   ;
        return view('admin.customer.show', compact('currentUser','user','roles','customer_wallets'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        
        $user->update($request->all());
        return redirect()->route('customers')
                        ->with('success','Member is updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        User::destroy($user->id);
        return redirect()->route('customers')
                        ->with('success','Member is deleted successfully');
    }
}