<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Artesaos\SEOTools\SEOMeta;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use SEOToolsTrait;
    
    public function index()
    {
         $this->authorize('view', User::class);

         $users = User::orderBy('created_at', 'desc')->paginate(2);

         $this->seo()->metatags()->addMeta('robots', 'noindex, nofollow');

         return view('userListView', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $this->seo()->metatags()->addMeta('robots', 'noindex, nofollow');

        return view('profil', ['user'=>$user] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', User::find($id));

        $user = User::findOrFail($id);

        $this->seo()->metatags()->addMeta('robots', 'noindex, nofollow');

        return view('profilUpdate', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $this->authorize('update', User::find($id));
        
        $user = User::find($id);

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->pseudo = $request->pseudo;
        $user->birth_date = $request->birth_date;
        $user->email = $request->email;

        $user->save();

        $this->seo()->metatags()->addMeta('robots', 'noindex, nofollow');

        return view('profil', ['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', User::find($id));

        $user = User::find($id);

        $user->delete();

        $this->seo()->metatags()->addMeta('robots', 'noindex, nofollow');

        return Redirect::back();
    }

    public function contact($id)
        {
            $this->authorize('contactUser', User::class);

            $user = User::find($id);

            $this->seo()->metatags()->addMeta('robots', 'noindex, nofollow');

            return view('contactUserForm',['user'=>$user]);
        }


    public function promote($id)
        {
            $this->authorize('promote', User::class); 

            $user = User::find($id);

            $user->admin = 1;

            $user->save();

            $this->seo()->metatags()->addMeta('robots', 'noindex, nofollow');

            return view('confirmAdmin', ['user'=>$user, 'admin'=>1]);
        }

    public function demote($id)
        {
            $this->authorize('demote', User::class); 

            $user = User::find($id);

            $user->admin = 0;

            $user->save();

            $this->seo()->metatags()->addMeta('robots', 'noindex, nofollow');

            return view('confirmAdmin', ['user'=>$user, 'admin'=>0]);
        }
}
