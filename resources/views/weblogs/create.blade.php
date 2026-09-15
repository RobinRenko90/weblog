@extends('layouts.main')

@section('content')

    <form action="{{Route('weblogs.store')}}" method="post">
        @csrf
        <label for="title">Titel</label>
        <input class="border border-[#19140035] w-full" type="text" name="title" id="title">

        <label for="description" value="">Omschrijving</label>
        <textarea class="border border-[#19140035] w-full" name="description" id="description" rows="5"></textarea>

        <input type="hidden" name="user_id" value="1">

        <input class="px-2 border" type="submit" value="Opslaan">
    </form>
@endsection