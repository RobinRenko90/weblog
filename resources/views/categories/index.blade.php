@extends('layouts.main')
@section('title')
    <h2 class="text-3xl">Categorieën overzicht</h2>
@endsection


@section('content')
@include('components.alerts')
    <div class="grid gap-4">
        <a class="underline w-50" href="{{ route('categories.create') }}">Categorie aanmaken</a>
        {{-- @foreach($weblogs as $weblog)
            <a href="{{ route('weblogs.show', $weblog->id) }}" class="border p-2">
                <b class="text-lg">{{ $weblog->title }}</b>
                <p>{{ $weblog->description }}</p>
                <i class="text-sm">{{ $weblog->created_at }}</i>
            </a>
        @endforeach --}}
    </div>
@endSection