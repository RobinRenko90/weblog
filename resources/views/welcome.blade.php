@extends('layouts.main')

@section('title')
    <h2 class="text-3xl">Welkom</h2>
@endsection

@section('content')
    <div class="flex">
        <div class="w-full flex-1">
            <nav>
                <a href="{{ route('weblogs.index') }}">weblogs</a>
            </nav>
        </div>
    </div>    
@endsection