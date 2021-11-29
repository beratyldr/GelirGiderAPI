<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function store(Request $request){
        $rules = [
            'name' => 'unique:users|required',
            'email'    => 'unique:users|required',
            'password' => 'required',
        ];
    
        $input     = $request->only('name', 'email','password');
        
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $name = $request->name;
        $email    = $request->email;
        $password = $request->password;
        $user     = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);

        return response()->json(['success' => true, 'success' =>"You have successfuly added the new user"]);

    }

    public function login(Request $request){
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            /** @var \App\User $user **/
            $user = Auth::user();
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $success['token']=$token;
            $success['user_id'] = $user->id;
            $success['email'] = $user->email;
            $success['name'] = $user->name;
            return response()->json($success, 200);
        } else {
            return response()->json('Email veya şifre yanlış.', 401);
        }
    }

    public function index()
    {       
        return request()->user();
    }
}
