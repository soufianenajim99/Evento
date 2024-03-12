<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Client;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrgaController extends Controller
{
    protected $count;
    public function __construct() 
{
    $this->count = Reservation::whereNull('validated_at')->count();
}   
    
    public function dashboard(){
        $counte = Event::all()->count();
        $countu = User::all()->count();
        $countr = Reservation::all()->count();
        $countc = Categorie::all()->count();
        return view('organisateur.dashboard',[
            'count'=>$this->count,
            'events'=>$counte,
            'users'=>$countu,
            'cats'=>$countc,
            'resers'=>$countr
        ]);
    }


    public function settings(){
        $cle = Client::with('events')->get();
        
       
        return view('organisateur.settings',[
            'count'=>$this->count,
            'clients'=>$cle
        ]);
    }
    public function events(){
        $cats= Categorie::all();
        $events = Event::latest()->paginate(5);
        return view('organisateur.events',[
            'events'=>$events,
            'cats'=>$cats,
            'count'=>$this->count
        ]);
    }


    public function accdem(string $id,string $bid){
        $reser = Reservation::where('client_id',$bid)->where('event_id',$id)->first();

        $reser->validated_at = Carbon::now();
        $reser->save();
        return redirect()->route('orga.sett');
    }
    public function refdem(string $id,string $bid){
        $event = Event::findOrFail($id);
        $event->client()->detach($bid);
        return redirect()->route('orga.sett');
    }
}