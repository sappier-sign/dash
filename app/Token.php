<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Token extends Model
{
    protected $table = 'api_users';
    public static function getToken(){
    	return Token::where('user_name', Auth::user()->apiuser)->first();
	}
}
