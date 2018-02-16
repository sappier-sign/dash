<?php

namespace App\Http\Controllers;

use App\Token;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
	public function __construct(  )
	{
		$this->middleware('auth');
	}

	public function index()
	{
	    return view('layouts.login');
	}

    public function getTransactions(){
        return view('pages.home', ['transactions' => Transaction::getTodaysTransactions(), 'user' => Auth::user()]);
    }

    public function redirectToHome()
    {
        return Redirect::to('dashboard');
    }

    public function getApiKey(){
    	return view('pages.apikey', ['token' => Token::getToken(), 'user' => Auth::user()]);
	}

	public function changePassword(){
    	return view('pages.changepassword', ['token' => Token::getToken(), 'user' => Auth::user()]);
	}

	public function test(){
		return view('pages.test', ['token' => Token::getToken(), 'user' => Auth::user()]);
	}

}
