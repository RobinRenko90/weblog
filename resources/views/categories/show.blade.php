@extends('layouts.main')

@section('content')
    @include('components.alerts')

    <form class="grid" action="{{Route('categories.update', $category->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name" class="font-semibold">Naam categorie</label>
        <input class="border w-100 px-1" type="text" name="name" id="name" placeholder="Naam categorie...." value="{{ $category->name }}">
        <button class="text-left cursor-pointer w-fit px-2 py-2 mt-5 bg-blue-500 text-white rounded" type="submit">Aanpassen</button>
    </form>    

    <form action="{{Route('categories.update', $category->id)}}" method="post">
        @csrf
        @method('DELETE')
            <button class="text-left cursor-pointer w-fit px-2 py-2 mt-5 bg-red-500 text-white rounded" type="submit"
                onclick="return confirm('Weet je zeker dat je deze categorie wilt verwijderen?')">
                Verwijderen
            </button>
    </form>
@endsection
