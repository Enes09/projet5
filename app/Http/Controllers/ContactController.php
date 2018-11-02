<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{

	public $contact;

    public function create()
    {
        return view('contactModel');
    }

    public function contactUser (ContactRequest $request)
    {
    	$this->authorize('create');

        Mail::to($request->email)
            ->send(new Contact($request->except('_token')));
 
        return view('mailToUserConfirm');
    }

    public function contactSite()
    	{
    		return view('contactSiteView');
    	}

    public function contactSiteSend(ContactRequest $request)
    	{

    		Mail::to('enes.er2709@gmail.com') 
            ->send(new Contact($request->except('_token')));

    		Session::flash('status', 'Votre mail a été envoyer, nous nous efforçons de vous répondre dans les plus bref délais.');

    		return view('mailToUserConfirm');
    	}
}
