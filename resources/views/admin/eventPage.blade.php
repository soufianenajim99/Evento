@extends('admin.layout')
@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white p-6 rounded-lg shadow-lg">

        <h1 class="text-2xl font-bold mb-4 ">
           {{$event->name}}
        </h1>
        
        <img class="max-w-sm mx-auto my-4 rounded-lg shadow" src="/images/events/{{$event->picture}}" alt="Chocolate Cake" class="mb-4 rounded-lg shadow-md">

        <h2 class="text-2xl font-bold">Description</h2>
        <p class="text-gray-900 mb-4 break-words">{{
           $event->description
           }}</p>

<div class="space-y-2">
    <h2 class="text-2xl font-bold">l'Organisateur: {{$event->user->username}}</h2>
    <p class="flex items-center text-sm text-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
        </svg>
        {{$event->lieu}}
    </p>
    <div class="flex items-center text-sm text-gray-500">
        <p class="flex items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
            </svg>
            {{$date->toFormattedDateString()}}
          
        </p>
        <p class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            starting {{$date->format('h:i A');}}
        </p>
    </div>
</div>
<br>

<div class="space-y-1">
    <br>
    <h5 class="flex items-center justify-between text-lg font-semibold text-gray-700">
        <span>Nombre de Places</span>
        <span>{{$event->nbrPlacesDispo}}</span>
    </h5>
    <br>
    <h5 class="flex items-center justify-between text-lg font-semibold text-gray-700">
        <span>Prix</span>
        <span>${{$event->price}}</span>
    </h5>
    <br>
    <h5 class="flex items-center justify-between text-lg font-semibold text-gray-700">
        <span>Category</span>
        <span>{{$event->category->name}}</span>
    </h5>
    <br>
    <h5 class="flex items-center justify-between text-lg font-semibold text-gray-700">
        <span>Type De Validation</span>
        <span>{{$event->Validation_type}}</span>
    </h5>
    <br>
 
</div>
{{-- {{route('admin.eventval', ['id' => $event['id']])}} --}}
        <div class="text-center">
            @if ($event->validated_at == null)
             
            <button class="btn btn-outline btn-success"><a href="{{route('admin.eventval',['id'=>$event['id']])}}">Valider La Demande</a></button>
            <button class="btn btn-outline btn-error"><a href="{{route('admin.eventref',['id'=>$event['id']])}}">Refuser La Demande</a></button>
            @else
            <button class="btn btn-outline btn-success btn-disabled">Cet Evenement est Dega Valide</button>
            @endif
        </div>
    </div>
</div>

@endsection