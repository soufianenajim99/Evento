<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function myReser(){
        return view('client.myreser');
    }
    public function events(){
        $events= Event::latest()->paginate(9);
        return view('client.events',[
            'events'=>$events
        ]);
    }
    public function eventpage(string $id){
        $event = Event::findOrFail($id);
        return view('client.event',[
            'event'=>$event
        ]);
    }

}