<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Client;
use App\Models\Event;
use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function myReser(){
        $cle = Client::with('events')->where('user_id',Auth::user()->id)->first();
        return view('client.myreser',[
            'client'=>$cle
        ]);
    }
    public function events(){
        $events= Event::latest()->whereDate('date','>=',Carbon::now());
        if(request('search')){
            $events
               ->where('name','LIKE','%'.request('search').'%');
               if(request('category')){
                $events
               ->where('category_id',request('category'));
               }
          }
          if(request('category')){
            $events
           ->where('category_id',request('category'));
           }
        $cats = Categorie::all();
        return view('client.events',[
            'events'=>$events->paginate(9),
            'cats'=>$cats
        ]);
    }
    public function eventpage(string $id){
        $event = Event::findOrFail($id);
        return view('client.event',[
            'event'=>$event
        ]);
    }

    public function GenerateTicket(string $id){
        $event=Event::findOrFail($id);
        $user=Auth::user();
        $reser = Reservation::where('event_id',$event->id)->where('client_id',$user->client->id)->first();
        // dd($reser->validated_at);
        $datee = Carbon::parse($reser->validated_at);
        $pdf = Pdf::loadView('client.ticket',[
            'event'=>$event,
            'user'=>$user,
            'date'=>$datee
        ]);
        return $pdf->download();
    }

}