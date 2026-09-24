@extends('layouts.main')

@section('content')
    @include('components.alerts')

    <p class="mb-3 text-2xl">Bewerken</p>

    <form action="{{Route('weblogs.update', $weblog)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PATCH")    
        <div class="grid grid-cols-1 w-150">

            <label for="title"><strong>Titel</strong></label>
            <input class="border border-[#19140035] w-full p-1 mb-2" type="text" name="title" id="title" value="{{ old ( 'title', $weblog->title ) }}">

            <label for="description" value=""><strong>Omschrijving</strong></label>
            <textarea class="border border-[#19140035] w-full p-1 mb-2" name="description" id="description" rows="5">{{ old ( 'description', $weblog->description ) }}</textarea>

            <label for="image"><strong>Afbeelding</strong></label>
            <input class="mb-2" type="file" name="image" id="image">

            <label for="category"><strong>Categorieën</strong></label>
            <select name="category[]" id="category" class="border p-1 mb-2" multiple>
                <option value="select" disabled>Selecteer een categorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ in_array($category->id, $selectedCategories) ? "selected" : "" }}>
                     {{ $category->name }}</option>
                @endforeach    
            </select>

            <label for="premium"><strong>Premium content</strong></label>
            <div class="flex w-fit gap-2 mb-2">
                <input type="hidden" name="premium" value="0">
                <input type="checkbox" name="premium" id="premium" value="1" {{ $weblog->premium ? 'checked' : '' }}><span class="right-left">premium</span>
            </div>

            <input type="hidden" name="user_id" value="{{ $weblog->user_id }}">
            <input class="text-left cursor-pointer w-fit px-2 py-2 mt-5 bg-blue-500 text-white rounded" type="submit" value="Opslaan">
        </div>
    </form>
@endsection