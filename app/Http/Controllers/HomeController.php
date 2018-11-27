<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\SEOMeta;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    use SEOToolsTrait;

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

        $this->seo()->setTitle('Dishelp accueil');
        $this->seo()->setDescription('Dishelp est un site visant à aider les personnes en difficulté en leur permettant d\'aider les autres à leur tour, Vous avez besoin d\'aide ? Vous voulez aider ? Dishelp vous donne le choix...');

        return view('home');
    }

    public function legal ()
        {
            return view('legalMentions');
        }
}
