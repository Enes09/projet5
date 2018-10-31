<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use Auth;

class Comment extends Model
{
    protected $fillable = ['user_id','post_id', 'title', 'content', 'created_at', 'updated_at'];

    public function create ()
    	{
    		
    	}

    public function alertedByUsers ()
    	{
    		return $this->belongsToMany(User::class, 'alerted_comment', 'comment_id');
    	}


    public function likedByUsers ()
    	{
    		return $this->belongsToMany(User::class, 'liked_comments', 'comment_id');
    	}

}
 