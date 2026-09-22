@extends('layouts.main')

@section('content')
    @include('components.alerts')

    <form action="{{Route('weblogs.store')}}" method="post">
        @csrf
        <div class="grid grid-cols-1 w-150">

            <label for="title">Titel</label>
            <input class="border border-[#19140035] w-full p-1 mb-2" type="text" name="title" id="title">

            <label for="description" value="">Omschrijving</label>
            <textarea class="border border-[#19140035] w-full p-1 mb-2" name="description" id="description" rows="5"></textarea>

            <label for="category">Categorieën</label>
            <select name="category[]" id="category" class="border p-1" multiple>
                    <option value="select" disabled>Selecteer een categorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach    
            </select>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <input class="text-left cursor-pointer w-fit px-2 py-2 mt-5 bg-blue-500 text-white rounded" type="submit" value="Opslaan">
        </div>
    </form>
@endsection