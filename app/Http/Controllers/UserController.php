<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth as FacadesAuth;

class UserController extends Controller
{
    function Register(Request $request){
        $incomingFields = $request->validate([
            'name'=>['required',Rule::unique('users','name')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','max:8']
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']); //Hashing password
         // taking the attributes of $incomingFields and putting it in user table
        $user =  User::create($incomingFields);
        FacadesAuth::login($user);
        return redirect('/home');
    }
    function Logout(){
        FacadesAuth::logout();
        return redirect('/home'); 
    }
    
    function Login(Request $request){
        $incomingFields = $request->validate(
            [
                "login-email" =>'required',
                'login-password'=>'required'

            ]
            );
            if(FacadesAuth::attempt(['email'=>$incomingFields['login-email'],'password'=>$incomingFields['login-password']])){
                $request->session()->regenerate();
            }
        return redirect('/home');
    }
}
