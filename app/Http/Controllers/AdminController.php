<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\Event;
use App\Models\Organisateur;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $count;
    public function __construct() 
{
    $this->count = Event::whereNull('validated_at')->count();
}   
    

    public function dashboard(){
        return view('admin.dashboard',[
            'count'=>$this->count
        ]);
    }
    public function users(){
        $users=User::withTrashed()->paginate(10);
        return view('admin.users',[
            'users'=>$users,
            'count'=>$this->count
        ]);
    }
    public function categories(){
        $cats = Categorie::latest()->paginate(5);
        return view('admin.categories',[
            'cats'=>$cats,
            'count'=>$this->count
        ]);
    }
    public function events(){
        $events = Event::latest()->paginate(5);
        
        return view('admin.events',[
            'count'=>$this->count,
            'events'=>$events
        ]);
    }
    public function showevents(string $id){
        $event = Event::findOrFail($id);
        $date=Carbon::parse($event->date);
        return view('admin.eventPage',[
            'count'=>$this->count,
            'event'=>$event,
            'date'=>$date
        ]);
    }

   public function desactivateUser(string $id){
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('admin.users');
   }
   public function activateUser(string $id){
    $user = User::withTrashed()->findOrFail($id);
    $user->restore();
    return redirect()->route('admin.users');
   }
   public function validateEvent(string $id){
    $event = Event::findOrFail($id);
    $event->validated_at = Carbon::now();
    $event->save();
    return redirect()->route('admin.events');
   }
   public function rejectEvent(string $id){
    $event = Event::findOrFail($id);
    $event->delete();
    return redirect()->route('admin.events');
   }



}