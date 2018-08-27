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
//User Routes
Route::group(['middleware' => ['auth']], function(){
  Route::get('/', array('uses' => 'UserController@index', 'as' => 'index'));
  Route::get('logout', array('uses' => 'UserController@getLogout', 'as' => 'getLogout'));

  Route::get('account', array('uses' => 'AccountController@getAccount', 'as' => 'getAccount'));
  Route::get('all_accounts', array('uses' => 'AccountController@allAccounts', 'as' => 'allAccounts'));
  Route::get('edit_account/{id}', array('uses' => 'AccountController@getEditAccount', 'as' => 'getEditAccount'));

  Route::get('income', array('uses' => 'IncomeController@getIncome', 'as' => 'getIncome'));
  Route::get('all_incomes', array('uses' => 'IncomeController@allIncomes', 'as' => 'allIncomes'));
  Route::post('edit_income/{id}', array('uses' => 'IncomeController@postEditIncome', 'as' => 'postEditIncome'));

  Route::group(array('before' => 'csrf'), function(){
    Route::post('account', array('uses' => 'AccountController@postAccount', 'as' => 'postAccount'));
    Route::post('edit_account/{id}', array('uses' => 'AccountController@postEditAccount', 'as' => 'postEditAccount'));

    Route::post('income', array('uses' => 'IncomeController@postIncome', 'as' => 'postIncome'));
    Route::post('edit_income/{id}', array('uses' => 'IncomeController@postEditIncome', 'as' => 'postEditIncome'));
    Route::post('all_incomes', array('uses' => 'IncomeController@postAllIncomes', 'as' => 'postAllIncomes'));
  });

});

//Guest Routes
Route::group(array('middleware' => 'web'), function(){
   Route::get('register', array('uses' => 'GuestController@getRegister', 'as' => 'register'));
   Route::get('login', array('uses' => 'GuestController@getLogin', 'as' => 'login'));
    Route::group(array('before' => 'csrf'), function(){
       Route::post('register', array('uses' => 'GuestController@postRegister', 'as' => 'postRegister'));
       Route::post('login', array('uses' => 'GuestController@postLogin', 'as' => 'postLogin'));
    });
});
