<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
//use Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

	public function login( Request $request )
	{
	    $validator = Validator::make($request->all(), [
            'email'     => 'bail|required|email|exists:users',
            'password'  => 'bail|required|min:5'
        ],[
            'email.exists' => 'No user found for that email'
        ]);

	    if ($validator->fails()){

            return Redirect::back()->withInput()->withErrors($validator);

        } elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password], false)){

			return redirect('/');

		} else {

            return Redirect::back()->withInput()->withErrors(['Credentials mismatch']);

        }

    }

	public function logout()
	{
		Auth::logout();
		return redirect('/login');
    }

    public function showLoginForm()
    {
        return view('layouts.login');
    }

}
