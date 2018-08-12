<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\View;
use App\Department;
use App\User;

class GuestController extends Controller
{
    //Get register view
    public function getRegister(){
      $departments = Department::all();
      return view('guest.register')->with('departments', $departments);
    }

    //Get login view
    public function getLogin(){
      return view('guest.login');
    }

    public function postRegister(Request $request){
        $validate = Validator::make(Input::all(), array(
           'name' => 'required|unique:users|min:3',
           'email' => 'required|unique:users',
           'password' => 'required|min:3',
           'dept_id' => 'required',
        ));

        if($validate->fails()){
            return Redirect::route('register')->withErrors($validate)->withInput();
        }else {
          // code...
          $user = new User();
          $user->name = $request['name'];
          $user->email = $request['email'];
          $user->dept_id = $request['dept_id'];
          $user->password = Hash::make($request['password']);

          if($user->save()){
                return Redirect::route('login')->with('success', 'Registration Successful');
            }else{
                return Redirect::route('register')->with('fail', 'An error occurred');
            }
        }
    }

    public function postLogin(Request $request){
      $validator = Validator::make(Input::all(),array(
            'email' => 'required',
            'password' => 'required'
        ));
        if($validator->fails()){
            return Redirect::route('login')->withErrors($validator)->withInput();
        }else{
            $remember = (Input::has('remember')) ? true : false;
            $auth = Auth::attempt(array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ), $remember);
            if ($auth) {
                $user = Auth::User();
                return Redirect::intended('/')->with('user', $user);
            } else {
                return Redirect::route('login')->with('fail', 'Invalid Username and password');
            }
        }
    }
}
