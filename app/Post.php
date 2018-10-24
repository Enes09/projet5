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

    public function view()
	    {
	        $postData = DB::table('posts')->paginate(2);
	        return $postData;
	    }

	public function create($values)
		{
			
			DB::table('posts')->insert([

				'user_id' => Auth::user()->id,
				'title' => $values['title'],
				'content' => $values['content'],
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now(),
			
			]);

		}

	public function edit( $id)
		{

		}

	public function delete()
		{

		}
}
