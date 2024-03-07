<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class OrgaController extends Controller
{
    public function dashboard(){
        return view('organisateur.dashboard');
    }

    public function settings(){
        return view('organisateur.settings');
    }
    public function events(){
        $events = Event::latest()->paginate(5);
        return view('organisateur.events',[
            'events'=>$events
        ]);
    }
}