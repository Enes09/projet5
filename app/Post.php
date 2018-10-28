<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use Auth;

class Post extends Model
{

	protected $fillable = ['user_id', 'title', 'content', 'created_at', 'updated_at'];

	public function create()
		{

		}


	public function edit($id)
		{

		}
}
