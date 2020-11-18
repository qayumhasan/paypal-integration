<?php

use Illuminate\Support\Facades\Route;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use config\app\PayPal;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/paypal',function(){

    $provider = new PayPalClient;
        $data = uniqid();
        //  $data = $this->cartData($invoiceId);
        // $provider->setExpressCheckout($data);
        // $response = $provider->setExpressCheckout($data);
        // $response =$provider->setCurrency('EUR')->setExpressCheckout($data);
        $response = $provider->setCurrency('EUR')->setExpressCheckout($data);
        return $response;
        //return redirect($response['paypal_link']);
});

Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
