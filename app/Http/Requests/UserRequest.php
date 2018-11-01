<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'name'=>'required|max:255',
            'last_name'=>'required|max:255',
            'pseudo'=> 'required|max:255|unique:users,pseudo,'.$this->id,
            'birth_date'=>'required|max:255',
            'email'=>'required|email|unique:users,email,'.$this->id,

        ];
    }
}
