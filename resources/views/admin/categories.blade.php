@extends('admin.layout')
@section('content')
<div class="main-content">
    <button class="btn btn-outline btn-success float-right" id="button">Ajouter Une Categorie</button>
    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Description
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($cats as $cat)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$cat->name}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$cat->description}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium inline-flex items-center gap-3">
                   <button class="btn btn-success"><a href="{{ route('categorie.edit',['categorie'=>$cat['id']])}}">Editer Categorie</a></button>
               
                  <form action="{{route('categorie.destroy', ['categorie' => $cat['id']])}}" method="POST" class=" m-0 p-0 ">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-error" type="submit">Supprimer Categorie</button> 
                        </form>
                </td>
            </tr>
            @endforeach
    
        </tbody>
    </table>
    {{ $cats->links() }}
</div>

<div class="text-ok hidden">
    <h1>Le Contenu  n'existe pas</h1>
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
            <form action="{{route('categorie.store')}}"  method="POST">
                @csrf
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-full">
                        <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">Nom de Categegorie</label>
                        <input type="text" name="name" id="product-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Nom de Categorie">
                    </div>
                    <div class="col-span-full">
                        <label for="product-details" class="text-sm font-medium text-gray-900 block mb-2">Description de Categorie</label>
                        <textarea name="description" id="product-details" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4" placeholder="Descripiton"></textarea>
                    </div>
                </div>
                <div class="p-6 border-t border-gray-200 rounded-b">
                    <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Enregistrer Categorie</button>
                </div>
            </form>
        </div>
    
        
    
    </div>
</div>



@endsection