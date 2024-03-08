<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function cli(){
        return view('auth.registercl');
    }
    public function choose(){
        return view('auth.choose');
    }
    public function login(){
        return view('auth.login');
    }

    public function orga(Request $request){

        // dd($request);
        $attributes = $request->validate([
            'username' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'image' => 'required|image'
        ], [

            'username.min' => 'The name must have more than 3 characters.',
            'username.unique' => 'This name is already taken.',
            'email.required' => 'The email is required.',
            'email.email' => 'Incorrect email structure.',
            'email.unique' => 'This email is already taken.',
            'password.min' => 'The password must have more than 3 characters.',
            'password.required' => 'The password is required.',
        ]);

        

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/users'),$fileName);
        $attributes = array_merge($attributes, ['picture' => $fileName]);
        
        $user = User::create($attributes);

        $user->assignRole('organisateur');

        

        $user->organisateur()->create();
        
        Auth::login($user);

        return redirect('/');
    }

    public function client(Request $request){

        // dd($request);
        $attributes = $request->validate([
            'username' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'image' => 'required|image'
        ], [

            'username.min' => 'The name must have more than 3 characters.',
            'username.unique' => 'This name is already taken.',
            'email.required' => 'The email is required.',
            'email.email' => 'Incorrect email structure.',
            'email.unique' => 'This email is already taken.',
            'password.min' => 'The password must have more than 3 characters.',
            'password.required' => 'The password is required.',
        ]);

        

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/users'),$fileName);
        $attributes = array_merge($attributes, ['picture' => $fileName]);
        
        $user = User::create($attributes);

        $user->assignRole('client');

        $user->client()->create();
        
        Auth::login($user);

        return redirect('/');
    }
}