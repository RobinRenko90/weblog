@extends('layouts.main')

@section('content')
    <p class="mb-3 text-2xl">Bewerken</p>

    <form action="{{Route('weblogs.update', $weblog)}}" method="post">
        @csrf
        @method("PATCH")    

        <label for="title">Titel</label>
        <input class="border border-[#19140035] w-full p-1 mb-2" type="text" name="title" id="title" value="{{ old ( 'title', $weblog->title ) }}">

        <label for="description" value="">Omschrijving</label>
        <textarea class="border border-[#19140035] w-full p-1" name="description" id="description" rows="5">{{ old ( 'description', $weblog->description ) }}</textarea>

        <input type="hidden" name="user_id" value="1"> {{-- later omzetten met auth --}} 

        <input class="px-2 border" type="submit" value="Opslaan">

    </form>
@endsection