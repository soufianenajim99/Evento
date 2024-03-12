<?php
use Carbon\Carbon;
?>
@extends('client.layout')
@section('content')

<div class="container mx-auto relative">
  <div class="flex items-center justify-center">
    <nav class=" mt-28 w-5/6 fixed z-50">
        <div class="navbar bg-base-300 rounded-3xl ">
            <div class="flex-1">
              <a class="btn btn-ghost text-xl" href="{{route('home')}}">Evento</a>
            </div>
            <div class="flex-none gap-2">
              <div class="form-control">
                <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
              </div>
              <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                  <div class="w-10 rounded-full">
                    @if (Auth::check())
                    <img alt="" src="/images/users/{{Auth::user()->picture}}" />    
                    @else
                    <img alt="" src="/images/download.png" />    
                        
                    @endif
                  </div>
                </div>
                  <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
         @if (Auth::check())
                @if (Auth::user()->hasRole('organisateur'))
                       <li><a href="{{route('orga.dash')}}">Dashboard</a></li>
                       <li><a href="{{route('logout')}}">Logout</a></li>
                @endif
                @if (Auth::user()->hasRole('admin'))
                       <li><a href="{{route('admin.dash')}}">Admin Dashboard</a></li>
                       <li><a href="{{route('logout')}}">Logout</a></li>
                @endif
                @if (Auth::user()->hasRole('client'))
                       <li><a href="{{route('client.resers')}}">Mes Reservations</a></li>
                       <li><a href="{{route('logout')}}">Logout</a></li>
                @endif
                @else
                <li><a href="{{route('choose')}}">Register</a></li>
                <li><a href="{{route('login')}}">Login</a></li>
                @endif
                </ul>
              </div>
            </div>
        </div>
    </nav>
  </div> 


<section class="px-4 py-4 max-w-7xl mx-auto h-full w-full">
  <div class=" h-screen mt-36">
    
        

      <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nom Evenement
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Date
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre De Places Disponibles
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Lieu
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($client->events as $event)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$event->name}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$event->date}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$event->nbrPlacesDispo}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                   @if ($event->reservation->validated_at == null)
                   <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    En cours
                </span> 
                   @else
                   <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Confirmee
                </span> 
                   @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$event->lieu}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium inline-flex items-center gap-3">
                    @if ($event->reservation->validated_at == null)
                    <button class="btn btn-outline btn-success" disabled>Votre Demande Est En Cours De Traitement</button>
                    @else
                    <button class="btn btn-outline btn-accent"><a href="{{route('client.gentick',['id'=>$event->id])}}">Generer Le Ticket</a></button>
                    @endif
                </td>
            </tr>
            @endforeach
      
        </tbody>
      </table>
   
   

   
  </div>
 
</section>
  
  

</div>








{{-- {{ $client->events->links() }} --}}
@endsection