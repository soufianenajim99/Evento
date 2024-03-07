@extends('admin.layout')
@section('content')
<div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
    </div> 
    <div class="drawer-side">
      <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
      <div class="menu p-4 w-80 min-h-full bg-base-200 text-base-content flex items-center justify-center">
             <form class="max-w-md mx-auto p-6 bg-white border rounded-lg shadow-lg" action="{{route('categorie.store')}}"  method="POST">
                 @csrf
                 <h2 class="text-2xl font-bold mb-6">Ajouter Categorie</h2>
                 <div class="mb-4">
                     <label class="block text-gray-700 font-bold mb-2" for="name">
                   Nom:
                 </label>
                     <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" 
                     placeholder="Nom de Categorie">
                 </div>
                 <div class="mb-4">
                     <label class="block text-gray-700 font-bold mb-2" for="feedback">
                   Description:
                 </label>
                     <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="feedback" rows="5" placeholder="description" name="description"></textarea>
                 </div>
                 <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                 Submit
               </button>
             </form>
       
        
      </div>
    </div>
  </div>





  <label for="my-drawer" class="btn btn-outline btn-success float-righ">Ajouter Categorie</label>

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


@endsection