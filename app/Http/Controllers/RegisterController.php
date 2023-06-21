<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        
        return view("register.create");
    }

    public function store(){

        $attributes=  request()->validate([
            'name'=> 'required|max:255|unique:users,name',
            'email'=> 'required|email|unique:users,email',
            'password'=>'required|min:7|max:255',
        ]);

       $user=  User::create($attributes);

       auth()->login($user);
    

        return redirect('/');
       
    }
}
