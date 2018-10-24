<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    public function view()
	    {
	        $postData = DB::table('posts')->paginate(2);
	        return $postData;
	    }

	public function create(FormRequest $request)
		{

		}

	public function edit(FormRequest $request, $id)
		{

		}

	public function delete()
		{

		}
}
