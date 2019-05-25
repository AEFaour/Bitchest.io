<?php

/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Auth::routes();
// The role of this route :  display the dashboard
Route::get('/home', 'BackendController@index')->name('dashboard')->middleware('auth'); 
// The role of this route :  display the Currency List
Route::get('/listMonnaie', 'BackendController@listMonnaie')->name('listMonnaie')->middleware('auth'); 
// The role of this route :  display the Crypto List
Route::get('/listCrypto', 'BackendController@listMonnaieAdmin')->name('listCrypto')->middleware('auth');
// The role of this route :  display the customer accounts
Route::get('/account', 'BackendController@showaccount')->name('account')->middleware('auth'); 
// The role of this route :  update the customer accounts
Route::patch('/account/update/{user}', 'BackendController@update')->name('update')->middleware('auth'); 
// The role of this route :  display the customer
Route::get('/customers', 'BackendController@showcustomers')->name('customers')->middleware('auth'); 
// The role of this route :  display the customer wallets  
Route::get('/wallet', 'SpendcurrencyController@index')->name('customerwallet')->middleware('auth');
// The role of this route :  display the customer spends 
Route::get('/wallet/sell/{spendcurrency}', 'SpendcurrencyController@displaySpendcurrency')->name('wallet-sell')->middleware('auth'); //?
// The role of this route :  buy the crypto currencies
Route::get('/chart/buy/{crypto}', 'SpendcurrencyController@buyCrypto')->name('buy')->middleware('auth'); //?
// The role of this route :  confirm the purchase
Route::post('/chart/buy/{crypto}', 'SpendcurrencyController@confirmBuyCrypto')->name('confirm-buy')->middleware('auth'); //?
// The role of this route :  display the historic of customer wallets
Route::get('/historique', 'SpendcurrencyController@showHistorique')->name('wallet')->middleware('auth');
// The role of this route :  display the graphs
Route::get('/chart', 'ChartController@index')->name('chart')->middleware('auth'); 
// The role of this route :  display the chart of graphs
Route::get('/chart/{crypto}', 'ChartController@showCrypto')->name('chart')->middleware('auth');
// The role of this route :  display the customer sheet
Route::get('/customers/{user}/detail', 'CustomerController@show')->name('show')->middleware('auth'); 
// The role of this route :  delete a customer
Route::get('/customers/{user}/delete', 'CustomerController@destroy')->name('delete')->middleware('auth'); 
// The role of this route :  modify a customer
Route::get('/customers/{user}/modify', 'CustomerController@index')->name('modify')->middleware('auth'); 
// The role of this route :  update a customer
Route::patch('/customers/update/{user}', 'CustomerController@update')->name('update')->middleware('auth');//?
// The role of this route :  create a customer
Route::get('/customers/create', 'CustomerController@create')->name('createcustomers')->middleware('auth'); 
// The role of this route :  create a store for customer
Route::post('/customers/create', 'CustomerController@store')->name('store')->middleware('auth');
 


