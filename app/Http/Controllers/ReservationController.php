<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Event;
use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reserver(string $id){
        $event=Event::findOrFail($id);
        $event->nbrPlacesDispo--;
        $event->save();
        
        $datee=Carbon::parse($event->date);
        $user=Auth::user();
        $client=Client::where('user_id',$user->id)->first();
         if($event->Validation_type == 'automatique'){
            $date = Carbon::now();
         }elseif($event->Validation_type == 'manuel'){
            $date = null;
         }

        //  dd($client->id);
        Reservation::create([
            'event_id'=>$id,
            'client_id'=>$client->id,
            'validated_at'=>$date
        ]);

        if($event->Validation_type == 'automatique'){
            $pdf = Pdf::loadView('client.ticket',[
                'event'=>$event,
                'user'=>$user,
                'date'=>$datee
            ]);
            return $pdf->download();
        }else{
            return redirect()->route('home');
        }
     
    }
}