<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\DeleteRequest;
use Illuminate\Support\Facades\Redirect;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {

        $comments = Comment::where('post_id', $post_id)->orderBy('created_at', 'desc')->paginate(5);

        $users = User::get();

        $post = Post::find($post_id);

        return view('readCommentView', ['comments' => $comments, 'users' => $users, 'post' => $post] );
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Comment $comment)
    {
        $this->authorize('create', $comment);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, Comment $comment)
    {
        $this->authorize('create', $comment);

        $comment = new Comment;

        $comment->user_id = Auth::user()->id;
        $comment->content = $request->content;
        $comment->post_id = $request->post_id;

        $comment->save();

        $request->session()->flash('status', 'Le commentaire a été posté.');

        return Redirect::back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, Comment $comment)
    {

        $this->authorize('delete', $comment);

        $comment->find($request->id);

        $comment->delete();

        return Redirect::back();
    }


    public function alert($id, Comment $comment)
        {

            $this->authorize('alert', $comment);

            DB::table('alerted_comment')->insert(['user_id' => Auth::user()->id, 'comment_id' => $id]);

            return Redirect::back();
            
        }

    public function allow($id, Comment $comment)
        {
            $this->authorize('update', $comment);

            $comment->where('id', $id)->update(['allowed'=>true]);

            return Redirect::back();
        }

    public function like($id)
        {
            DB::table('liked_comment')->insert(['user_id'=>Auth::user()->id, 'comment_id'=>$id]);

            return Redirect::back();
        }

    public function dilike($id)
        {
            DB::table('disliked_comment')->insert(['user_id'=>Auth::user()->id, 'comment_id'=>$id]);

            return Redirect::back();
        }

}
