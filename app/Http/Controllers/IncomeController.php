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
use App\Income;

class IncomeController extends Controller
{
    //
    public function getIncome(){
      $accounts = Account::all();
      return view('user.income')->with('accounts', $accounts);
    }

    public function postIncome(Request $request){
      $validate = Validator::make(Input::all(), array(
         'description' => 'required|min:3',
         'amount' => 'required',
      ));

      if($validate->fails()){
          return Redirect::route('getIncome')->withErrors($validate)->withInput();
      }else{
        $income = new Income();
        $income->description = $request['description'];
        $income->amount = $request['amount'];
        $income->on_account = $request['on_account'];
        $income->created_by = Auth::user()->id;
        $income->last_updated_by = Auth::user()->id;

        if($income->save()){
              return Redirect::route('allIncomes')->with('success', 'Income Added');
          }else{
              return Redirect::route('getIncome')->with('fail', 'An error occurred');
          }
      }
    }

    public function getEditIncome($id){
      $income = Income::find($id);
      $accounts = Account::all();
      $users = User::all();

      return view('user.edit_income')->with('income', $income)->with('users', $users)->with('accounts', $accounts);
    }

    public function allIncomes(){
      $incomes = Income::all();
      $accounts = Account::all();
      $users = User::all();
      return view('user.all_incomes')->with('accounts', $accounts)->with('users', $users)
              ->with('incomes', $incomes);
    }

    public function postAllIncomes(){
      
    }

}
