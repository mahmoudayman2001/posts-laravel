<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class SessionController extends Controller
{

    public function create(){
        return view('session/create');
    }

    public function store(){

        $attributes = request()->validate([

            'name'=>'required',
            'password'=>'required'

        ]);
        if(auth()->attempt($attributes)){
            return redirect('/');
        }

       return back()->withErrors(['name'=>'name or password not right']);


    }
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success', 'Goodby');

    }

   
}
