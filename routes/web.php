<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('merchants')->group(function (){
    Route::get('/', 'UserController@index');
    Route::get('create', 'UserController@create');
    Route::post('create', 'UserController@store');
});

Route::prefix('reports')->group(function (){
    Route::get('/', 'TransactionsController@reports');
    Route::get('{date_range}', 'TransactionsController@reportsView');
    Route::post('view', 'TransactionsController@getReport');
    Route::get('download/{start}/{end}', 'TransactionsController@downloadReport');
});

Route::prefix('transactions')->group(function (){
    Route::get('/', 'UserController@getAllTransactions');
    Route::post('filter', 'UserController@filterTransactionsByValue');
    Route::get('filter/{parameter}/{value}', 'TransactionsController@filterTransactionsByValue');
    Route::get('count/months', 'TransactionsController@getTransactionsCountByMonths');
    Route::get('{start}/{end}', 'TransactionsController@fetchTransactions');
    Route::post('test', 'TransactionsController@testTransaction');
});

Route::prefix('password')->group(function (){
    Route::get('change', 'LoginController@changePassword');
    Route::post('change', 'UserController@changePassword');
});

Route::get('login', 'LoginController@index');
Route::get('dashboard', 'LoginController@getTransactions');
Route::get('', 'LoginController@redirectToHome');



Route::get('credentials', 'LoginController@getApiKey');

Route::resource('terminals', 'TerminalController');
Route::resource('documentations', 'DocsController');

Route::get('home', 'HomeController@index');
Route::get('test', 'LoginController@test');

Auth::routes();
