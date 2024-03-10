@extends('admin.layout')
@section('content')

<form class="max-w-md mx-auto p-6 bg-white border rounded-lg shadow-lg" action="{{route('categorie.update',['categorie'=>$cate->id])}}"  method="POST">
    @csrf
    @method('PUT')
    <h2 class="text-2xl font-bold mb-6">Editer Categorie</h2>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="name">
      Nom:
    </label>
        <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" 
        value="{{$cate->name}}">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="feedback">
      Description:
    </label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="feedback" rows="5" placeholder="{{$cate->description}}" name="desc"></textarea>
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
    Submit
  </button>
</form>

@endsection