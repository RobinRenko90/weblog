@extends('layouts.main')

@section('title')
    <h2 class="text-3xl">Welkom</h2>
@endsection

@section('content')
    <div class="flex">
        <div class="w-full flex-1">
            <nav class="grid grid-cols-1">
                <a href="{{ route('weblogs.index') }}">Weblogs</a>
                <a href="{{ route('categories.index') }}">Categorieen</a>
            </nav>
        </div>
    </div>    
@endsection