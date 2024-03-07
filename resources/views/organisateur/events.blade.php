@extends('organisateur.layout')
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
                Validee ou En cours
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$event->lieu}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium inline-flex items-center gap-3">
               <button class="btn btn-success"><a href="{{ route('event.edit',['event'=>$event['id']])}}">Editer evenement</a></button>
           
              <form action="{{route('event.destroy', ['event' => $event['id']])}}" method="POST" class=" m-0 p-0 ">
                @csrf
                @method('DELETE')
                <button class="btn btn-error" type="submit">Supprimer Evenement</button> 
                    </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
{{ $events->links() }}
@endsection