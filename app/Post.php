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
	        $postData = DB::table('posts')->get();

	        return $postData;
	    }

    
    
}
