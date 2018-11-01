<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{

	public $contact;

    public function create()
    {
        return view('contactUserModel');
    }

    public function contactUser (ContactRequest $request)
    {
        Mail::to($request->mail)
            ->send(new Contact($request->except('_token')));
 
        return view('mailToUserConfirm');
    }

    public function contactSite()
    	{
    		return view('contactSiteView');
    	}

    public function ContactSiteSend()
    	{
    		Mail::to('enes.er2709@gmail.com')->send(new Contact($request->except('_token')));

    		Session::flash('status', 'Votre mail a été envoyer, nous nous efforçons de vous répondre dans plus bref délais.')

    		return view('home');
    	}
}
