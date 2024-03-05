<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){
        $attributes=$request->validate([
            'email'=> 'required',
            'password'=> 'required',
            ]);

        if(! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();
        $redirect = 'login';
        switch (true) {
            case auth()->user()->hasRole('organisateur'):
                $redirect = 'dashboard_orga';
                break;
            case auth()->user()->hasRole('client'):
                $redirect = '/';
                break;
        }

        return redirect()->route($redirect);
    }

  

    public function logout(Request $request){
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}