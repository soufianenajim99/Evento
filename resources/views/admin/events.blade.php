@extends('admin.layout')
@section('content')

<table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
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
        @foreach ($events as $event)
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
               @if ($event->validated_at == null)
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
                @if ($event->validated_at == null)
                <button class="btn btn-outline btn-success"><a href="{{route('admin.epage',['id'=>$event->id])}}">Voir La Demande</a></button>
                @else
                <button class="btn btn-outline btn-accent"><a href="{{route('admin.epage',['id'=>$event->id])}}">Voir L'Event</a></button>
                @endif
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
{{ $events->links() }}

@endsection