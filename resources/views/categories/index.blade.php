@extends('layouts.main')
@section('title')
    <h2 class="text-3xl">Categorieën overzicht</h2>
@endsection


@section('content')
@include('components.alerts')
    <div class="grid gap-4">
        <a class="w-fit bg-gray-500 p-2 text-white rounded" href="{{ route('categories.create') }}">Categorie aanmaken</a>
        <table>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td><a href="{{ route('categories.show', $category->id) }}">bewerken</a></td>
            </tr>
        @endforeach
        </table>
    </div>
@endSection