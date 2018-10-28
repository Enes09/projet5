<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Comment;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name', 'pseudo' , 'birth_date' , 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isSuperAdmin ()
        {
            if ($this->super_admin === 1)
                {
                    return true; 
                }
            else 
                {
                    return false;
                }
        }

    public function isAdmin ()
        {
            if ($this->admin === 1)
                {
                    return true; 
                }
            else 
                {
                    return false;
                } 
        }

    public function isUser()
        {
            if(Auth::user())
                {
                    return true;
                }
        }

    public function isOwner($id)
        {
            if($this->id === $id || $this->admin === 1 )
                {
                    return true;
                }
        }

    public function canAlert($comment_id)
        {
            return view('test');
            $alerted = DB::table('alerted_comment')->get();

            $alerteTable = [];

            foreach($alerted as $alert)
            {
                array_push($alerteTable, $alert->user_id);

            }

            if (in_array($this->id, $alerteTable)) 
                {
                    return false;   
                }
            else
                {
                    return true;
                }
        }
}
