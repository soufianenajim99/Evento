<?php
use Carbon\Carbon;
?>
@extends('client.layout')
@section('content')
<section class="bg-[#C7CCD6]">
    <div class="flex flex-wrap bg-white rounded-2xl w-screen items-center justify-center">
        <div class="mb-10 sm:w-8/12">
            <div class="container h-full p-10 mx-auto">
            <div class="flex flex-col gap-3 justify-center items-center">
                
                    <h1 class=" text-4xl font-bold">{{$event->name}}</h1>
            
            
            <img src="" alt="" srcset="">
            <p>{{$event->description}}</p>
            <img src="/images/events/{{$event->picture}}" alt="" srcset="" width="500" height="500">
            </div>
                    
                <header class="container items-center px-4 mt-10 lg:flex">
                    <div class="w-full">
                        <h5 class="mb-4 text-sm font-medium text-gray-600">Event Information</h5>

                        <div class="overflow-hidden">
                            <table class="min-w-full border rounded-md">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-sm font-semibold text-left text-gray-900">
                                           Nombre de Places Disponibles
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                           {{$event->nbrPlacesDispo}}

                                        </th>
                                    </tr>
                                 
                                </thead>
                                <tbody>
                                    <tr class="border-b">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            Category
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{$event->category->name}}
                                        </td>

                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Lieu</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{$event->lieu}}
                                        </td>

                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            Organisateur</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{$event->user->username}}
                                        </td>

                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Date</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{Carbon::parse($event->date)->toFormattedDateString()}} starting {{Carbon::parse($event->date)->format('h:i A');}}
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if ($event->nbrPlacesDispo == 0)
                        <button
                        disabled
                        class="btn btn-success flex items-center justify-center w-full px-4 py-3 mt-6 text-base font-semibold rounded-lg sm:mx-4 ">
                        Pas de Places Disponibles pour cet evenement
                       

                    </button>
                        @else
                            
                        <a href="{{route('client.reserve',['id'=>$event['id']])}}">
                        
                            <button
                                class="flex items-center justify-center w-full px-4 py-3 mt-6 text-base font-semibold bg-blue-500 rounded-lg sm:mx-4 text-gray-50 hover:bg-blue-900">
                                Reservez ce Evenement
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 h-4 ml-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
    
                            </button>
                        </a>
                        @endif
                    </div>
                </header>
            </div>
        </div>

        <div class="p-4 sm:w-4/12">
            <div class=" pb-6 bg-blue-50 rounded-xl sm:pb-20">
                <div class="pt-16 text-center">
                    <span class="text-base font-semibold text-gray-600">Total amount</span>
                    <p class="my-4 text-4xl font-bold text-blue-600">{{$event->price}}$</p>
                    <span class="flex items-center justify-center text-sm text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>

                        Secure payment
                    </span>
                </div>
              
            </div>
        </div>
    </div>
</section>
@endsection