@extends('layouts.main')

@section('content')
    @include('components.alerts')

    <form class="grid" action="{{Route('categories.store')}}" method="post">
        @csrf
        <label for="name" class="font-semibold">Naam categorie</label>
        <input class="border w-100 px-1" type="text" name="name" id="name" placeholder="Naam categorie....">
        <button class="text-left cursor-pointer w-fit px-2 py-2 mt-5 bg-blue-500 text-white rounded" type="submit">Toevoegen</button>
    </form>    
@endsection