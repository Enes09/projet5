<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\stripeRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PublicController extends Controller
{
    public function legal(){
    	return view('legalMentions');
    }

    public function payment(stripeRequest $request){

    	$val = explode(',',$request->donationInput);
    	$val = $val[0].$val[1];  	

    	/// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey("sk_test_kwqLOBYWgKg8XuSyfbtuYG5n");

		// Token is created using Checkout or Elements!
		// Get the payment token ID submitted by the form:
		$token = $_POST['stripeToken'];
		$charge = \Stripe\Charge::create([
		    'amount' => $val,
		    'currency' => 'eur',
		    'description' => 'dishelp Donation',
		    'source' => $token,
		]); 

		Session::flash('success', 'Votre don a été transmis, merci pour votre aide.');

		return view('confirmTransaction');
    }
}
