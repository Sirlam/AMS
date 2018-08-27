<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\User;
use App\Account;

class AccountController extends Controller
{
    //
    public function getAccount(){
      return view('user.account');
    }

    public function getEditAccount($id){
      $account = Account::find($id);
      $users = User::all();

      return view('user.edit_account')->with('account', $account)->with('users', $users);
    }

    public function postEditAccount($id){
      //$id = Input::get('id');
      $account = Account::find($id);
      $users = User::all();

      $validate = Validator::make(Input::all(), array(
         'name' => 'required|min:3',
         'description' => 'required|min:3',
      ));

      if($validate->fails()){
          return Redirect::back()->with('account', $account)->with('users', $users)->withErrors($validate)->withInput();
      }else{
        $account->name = Input::get('name');
        $account->description = Input::get('description');
        $account->last_updated_by = Auth::id();
        //$updateAccount = DB::table('accounts')->where([['id', '=', $id]])->update(['name' => $new_name, 'description' => $new_desc]);
        if ($account->update()) {
            return Redirect::route('allAccounts')->with('success', 'Account Modified');
        } else {
            return Redirect::back()->with('fail', 'Something went wrong, please try again later');
        }
      }
    }

    public function deleteAccount(){
    }

    public function postAccount(Request $request){
      $validate = Validator::make(Input::all(), array(
         'name' => 'required|unique:accounts|min:3',
         'description' => 'required|min:3',
         'starting_balance' => 'required',
      ));

      if($validate->fails()){
          return Redirect::route('getAccount')->withErrors($validate)->withInput();
      }else{
        $account = new Account();
        $account->name = $request['name'];
        $account->description = $request['description'];
        $account->starting_balance = $request['starting_balance'];
        $account->current_balance = $request['starting_balance'];
        $account->created_by = Auth::user()->id;
        $account->last_updated_by = Auth::user()->id;

        if($account->save()){
              return Redirect::route('allAccounts')->with('success', 'Account Added');
          }else{
              return Redirect::route('getAccount')->with('fail', 'An error occurred');
          }
      }
    }

    public function allAccounts(){
      $accounts = Account::all();
      $users = User::all();
      return view('user.all_accounts')->with('accounts', $accounts)->with('users', $users);
    }
}
