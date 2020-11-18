<!--
*** Thanks for checking out this README Template. If you have a suggestion that would
*** make this better, please fork the repo and create a pull request or simply open
*** an issue with the tag "enhancement".
*** Thanks again! Now go create something AMAZING! :D
-->





<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]






<!-- TABLE OF CONTENTS -->
## Table of Contents

* [INSTALLATION](#INSTALLATION)
* [Add Routes](#Add_Routes)
* [Create Controller](#Create_Controller)
* [Create View File](#Create_View_File)
* [Contributing](#contributing)
* [License](#license)
* [Contact](#contact)
* [Acknowledgements](#acknowledgements)




## INSTALLATION

Install the package through [Composer](http://getcomposer.org/).

For Laravel `composer require srmklive/paypal`

Now open config/app.php file and add service provider and aliase.
```
'providers' => [

	....

	Srmklive\PayPal\Providers\PayPalServiceProvider::class

]
`````

We can also custom changes on srmklive/paypal package, so if you also want to changes then you can fire bellow command and get config file in config/paypal.php.
``php artisan vendor:publish --provider "Srmklive\PayPal\Providers\PayPalServiceProvider"``

You can view paypal.php file like as bellow:
config/paypal.php
````
<?php

/**

 * PayPal Setting & API Credentials

 * Created by Raza Mehdi .

 */

     

return [

    'mode'    => env('PAYPAL_MODE', 'sandbox')

    'sandbox' => [

        'username'    => env('PAYPAL_SANDBOX_API_USERNAME', ''),

        'password'    => env('PAYPAL_SANDBOX_API_PASSWORD', ''),

        'secret'      => env('PAYPAL_SANDBOX_API_SECRET', ''),

        'certificate' => env('PAYPAL_SANDBOX_API_CERTIFICATE', ''),

        'app_id'      => 'APP-80W284485P519543T',

    ],

    'live' => [

        'username'    => env('PAYPAL_LIVE_API_USERNAME', ''),

        'password'    => env('PAYPAL_LIVE_API_PASSWORD', ''),

        'secret'      => env('PAYPAL_LIVE_API_SECRET', ''),

        'certificate' => env('PAYPAL_LIVE_API_CERTIFICATE', ''),

        'app_id'      => '',

    ],

    'payment_action' => 'Sale',

    'currency'       => env('PAYPAL_CURRENCY', 'USD'),

    'billing_type'   => 'MerchantInitiatedBilling',

    'notify_url'     => '',

    'locale'         => '',

    'validate_ssl'   => false,

];
````



<!-- GETTING STARTED -->
## Add Routes

```Route::get('payment', 'PayPalController@payment')->name('payment');```
```Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');```
```Route::get('payment/success', 'PayPalController@success')->name('payment.success');```

### Create Controller

```php artisan make:controller PayPalController```

After bellow command you will find new file in this path "app/Http/Controllers/PayPalController.php".

app/Http/Controllers/PayPalController.php

```` 
<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
   
class PayPalController extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {
        $data = [];
        $data['items'] = [
            [
                'name' => 'ItSolutionStuff.com',
                'price' => 100,
                'desc'  => 'Description for ItSolutionStuff.com',
                'qty' => 1
            ]
        ];
  
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = 100;
  
        $provider = new ExpressCheckout;
  
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);
  
        return redirect($response['paypal_link']);
    }
   
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        $response = $provider->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Your payment was successfully. You can create success page here.');
        }
  
        dd('Something is wrong.');
    }
}
``````

### Create View File

In this step, we need to update welcome.blade.php file. in this file we will put one button for paypal payment gateway. so let's put bellow code:

resources/views/products/welcome.blade.php

````
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  
        <title>Laravel 6 PayPal Integration Tutorial - ItSolutionStuff.com</title>
  
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
  
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .content {
                margin-top: 100px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
  
            <div class="content">
                <h1>Laravel 6 PayPal Integration Tutorial - ItSolutionStuff.com</h1>
                  
                <table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal Logo"></a></td></tr></table>
  
                <a href="{{ route('payment') }}" class="btn btn-success">Pay $100 from Paypal</a>
  
            </div>
        </div>
    </body>
</html>
``````
