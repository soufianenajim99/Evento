<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrgaController extends Controller
{
    public function dashboard(){
        return view('organisateur.dashboard');
    }
}