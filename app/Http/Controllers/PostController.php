<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\DB;
use Auth;
use Illuminate\Support\Facades\Redirect;

use Artesaos\SEOTools\SEOMeta;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use SEOToolsTrait;

    public function index(Post $post)
        {
            
           
            $postData = $post->orderBy('created_at', 'desc')->paginate(2);

            $users = User::get();

            $this->seo()->setTitle('Dishelp Post/Dishelp Billet');
            $this->seo()->setDescription('Lecture de billet Dishelp/ Read Dishelp posts');

            return view('readPostView', [ 
                'postData' => $postData,
                'users' => $users,
             ]);

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $this->authorize('store', $post);

        $this->seo()->metatags()->addMeta('robots', 'noindex, nofollow');

        return view('createPostView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Post $post)
    {
        $this->authorize('store', $post);

        $post = new Post;

        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        $request->session()->flash('status', 'Le billet a été posté.');

        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Post::class);

        $post = Post::FindOrFail($id);

        $this->seo()->metatags()->addMeta('robots', 'noindex, nofollow');

        return view('editPostView', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $this->authorize('update', Post::class);

        Post::where('id', $id)->update([

            'title'=>$request->title,
            'content'=>$request->content,
        ]);

        $request->session()->flash('status', 'Le billet a été modifié.');

        $this->seo()->metatags()->addMeta('robots', 'noindex, nofollow');

        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Post::class);

        $post = Post::find($id);

        $post->delete();

        $this->seo()->metatags()->addMeta('robots', 'noindex, nofollow');

        return Redirect::back();
    }
}
