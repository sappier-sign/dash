<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
    }

	public function getTransactions(){
		return view('pages.home', [ 'user' => Auth::user()]);
	}

	public function getAllTransactions()
	{
		return Transaction::getAllTransactions();
	}

    public function filterTransactionsByValue(Request $request)
    {
        return Redirect::to('transactions/filter/'.$request->parameter.'/'.$request->value);
	}

	public function getApiKey(){
		$token = Token::getToken()[0];
		return view('pages.apikey', compact('token'));
	}

	public function test(){
		return view('pages.test');
	}

    public function index()
    {
        if (Auth::user()->role === 'master'){
            return view('pages.users', ['merchants' => User::with('api_user')->get(), 'user' => Auth::user()]);
        }
	}

    public function create()
    {
        if (Auth::user()->role === 'master'){
            return view('pages.create_merchant', ['user' => Auth::user()]);
        }
	}

    public function store(Request $request)
    {
        $this->validate($request, [
            'api-email' =>  'bail|required|email',
            'company'   =>  'bail|required|unique:users',
            'actions'   =>  'bail|required|array'
    ]);
        $string = explode(' ', strtolower($request->input('company')))[0];
        $actions = implode(' ', $request->actions);

        $user = [];
        $user['apiuser']    =   uniqid($string);
        $user['email']      =   strtolower($request->input('api-email'));
        $user['company']    =   ucwords(strtolower($request->input('company')));
        $user['pass_code']  =   strtoupper(md5(microtime(1)));
        $user['role']       =   'user';

        $user['password']   =   bcrypt('admin');
        $user['contact']    =   $request->input('telephone', 'telephone');
        $user['address']    =   ucwords(strtolower($request->input('address', 'address')));

        return User::saveUser($user, $actions);
	}

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old-password'      =>  'bail|required|min:5',
            'password'          =>  'bail|required|min:6',
            'password-retype'   =>  'bail|required|min:6|same:password'
        ]);

        $user = User::find(Auth::id());

        if (password_verify($request->input('old-password'), $user->password) <> true){
            return Redirect::back()->withErrors(['old-password' => 'Wrong password.']);
        } elseif ($request->password === $request->input('old-password')) {
            return Redirect::back()->withErrors(['password' => 'Old password and new password cannot be the same', 'old-password' => '']);
        }

        $user->password = bcrypt($request->password);

        if($user->save()){
            Auth::logout();
            return redirect('/');
        }
	}
}
