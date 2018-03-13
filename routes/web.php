<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('merchants', 'UserController@index');
Route::get('merchants/create', 'UserController@create');
Route::post('merchants/create', 'UserController@store');

Route::get('reports', 'TransactionsController@reports');
Route::get('reports/{date_range}', 'TransactionsController@reportsView');
Route::post('reports/view', 'TransactionsController@getReport');


Route::get('login', 'LoginController@index');
Route::get('dashboard', 'LoginController@getTransactions');
Route::get('', 'LoginController@redirectToHome');

Route::get('transactions', 'UserController@getAllTransactions');
Route::post('transactions/filter', 'UserController@filterTransactionsByValue');
Route::get('transactions/filter/{parameter}/{value}', 'TransactionsController@filterTransactionsByValue');
Route::get('transactions/count/months', 'TransactionsController@getTransactionsCountByMonths');
Route::get('transactions/{start}/{end}', 'TransactionsController@fetchTransactions');
Route::post('transactions/test', 'TransactionsController@testTransaction');

Route::get('credentials', 'LoginController@getApiKey');

Route::get('password/change', 'LoginController@changePassword');
Route::post('password/change', 'UserController@changePassword');

Route::resource('terminals', 'TerminalController');
Route::resource('documentations', 'DocsController');

Route::get('home', 'HomeController@index');
Route::get('test', 'LoginController@test');

Auth::routes();
