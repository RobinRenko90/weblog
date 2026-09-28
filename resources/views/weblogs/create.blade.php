@extends('layouts.main')

@section('content')
    @include('components.alerts')

    <form action="{{Route('weblogs.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 w-150">

            <label for="title"><strong>Titel</strong></label>
            <input class="border border-[#19140035] w-full p-1 mb-2" type="text" name="title" id="title">

            <label for="description" value=""><strong>Omschrijving</strong></label>
            <textarea class="border border-[#19140035] w-full p-1 mb-2" name="description" id="description" rows="5"></textarea>

            <label for="image"><strong>Afbeelding</strong></label>
            <input class="mb-2" type="file" name="image" id="image">
            
            <label for="category"><strong>Categorieën</strong></label>
            <select name="category[]" id="category" class="border p-1 mb-2" multiple>
                    <option value="select" disabled>Selecteer een categorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach    
            </select>
            
            <div class="flex w-fit gap-2 my-2">
                <input type="hidden" name="premium" value="0">
                <input type="checkbox" name="premium" id="premium" value="1">
                <label for="premium">Premium content</label>
            </div>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input class="text-left cursor-pointer w-fit px-2 py-2 mt-5 bg-blue-500 text-white rounded" type="submit" value="Opslaan">
        </div>
    </form>
@endsection