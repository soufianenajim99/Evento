@extends('organisateur.layout')
@section('content')
<table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nom Evenement
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nom de Client
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
        @foreach ($clients as $client)
        @foreach ($client->events as $event)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$event->name}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$client->user->username}}
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
                <button class="btn btn-outline btn-success"><a href="{{route('orga.accde',['id'=>$event->id,'bid'=>$client->id])}}">Accepter</a></button>
                <button class="btn btn-outline btn-error"><a href="{{route('orga.refdem',['id'=>$event->id,'bid'=>$client->id])}}">Refuser</a></button>
                {{-- <button class="btn btn-outline btn-error"><a href="{{route('orga.refdem',['id'=>$event->id])}}">Refuser</a></button> --}}
                @else
                <button class="btn btn-outline btn-accent" disabled>Cette Demande a ete Accepte</button>
                @endif
            </td>
        </tr>
        @endforeach
        @endforeach
      
  
    </tbody>
  </table>
@endsection