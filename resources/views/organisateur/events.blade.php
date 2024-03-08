@extends('organisateur.layout')
@section('content')
<div class="main-content">
    <button class="btn btn-outline btn-success float-right" id="button">Ajouter Un Evenement</button>
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
                    <button class="btn btn-success"><a href="{{ route('event.edit',['event'=>$event['id']])}}">Editer evenement</a></button>
                    @endif
               
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

</div>

<div class="form hidden">
    <div class="bg-white border border-4 rounded-lg shadow relative m-10">

        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">
                Ajouter Evenement
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" id="buttonc" data-modal-toggle="product-modal">
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    
        <div class="p-6 space-y-6">
            <form action="{{route('event.store')}}"  method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">Nom d'evenement</label>
                        <input type="text" name="name" id="product-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Nom d'evenement" required="">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="category" class="text-sm font-medium text-gray-900 block mb-2">Caegory</label>
                        <select name="category_id" id="" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            @foreach ($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>   
                            @endforeach
                         </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Date</label>
                        <input type="datetime-local" name="date" id="brand" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Apple" required="">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Price</label>
                        <input type="number" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="$2300" required="">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Nombre De Place</label>
                        <input type="number" name="nbrPlacesDispo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Nombre De Place" required="">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Lieu</label>
                        <input type="text" name="lieu" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Lieu" required="">
                    </div>

                    <div class="col-span-full">
                        <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Type de validation</label>
                        <select name="Validation_type" id="" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                           <option value="automatique">automatique</option>
                           <option value="manuel">manuel</option>
                        </select>
                    </div>


                    <div class="col-span-full">
                        <div class="flex-1 items-center max-w-screen-sm mx-auto mb-3 space-y-4 sm:flex sm:space-y-0">
                            <div class="relative w-full">
                              <div class="items-center justify-center max-w-xl mx-auto">
                                <label class="flex justify-center w-full h-32 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none" id="drop"><span class="flex items-center space-x-2"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg><span class="font-medium text-gray-600">Choisir l'Image de l'evenement<span class="text-blue-600 underline ml-[4px]">browse</span></span></span><input type="file" name="picture" class="hidden" accept="image/png,image/jpeg" id="input"></label>
                              </div>
                            </div>
                          </div>
                    </div>

                   

                    <div class="col-span-full">
                        <label for="product-details" class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                        <textarea id="product-details" rows="6" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="p-6 border-t border-gray-200 rounded-b">
                    <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save all</button>
                </div>
            </form>
        </div>
    
        
    
    </div>
</div>
@endsection