<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'company', 'pass_code', 'apiuser', 'contact', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function api_user()
    {
        return $this->hasOne(ApiUser::class, 'user_name', 'apiuser');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'fld_042', 'merchant_id');
    }

    public static function saveUser($user, $actions)
    {
        if (DB::table('users')->insert($user)){
            $_user = User::where('company', $user['company'])->first();
            $_user->merchant_id = 'TTM-'.str_pad($_user->id,8,'0',STR_PAD_LEFT);
            $_user->save();

            $string = explode(' ', $user['company'])[0];
            $api_user = [
                'user_name'   =>  $user['apiuser'],
                'api_key'     =>  base64_encode(md5(str_shuffle($string))),
                'actions'     =>  strtolower($actions)
            ];

            DB::table('api_users')->insert($api_user);
        }


        return Redirect::to('merchants');
    }

    public static function insertUser(Array $user)
    {
        $user['password']   =   bcrypt('admin');
        return User::create($user);
    }

    public function terminals()
    {
        return $this->hasMany(Terminal::class, 'merchant_id', 'merchant_id');
    }
}
