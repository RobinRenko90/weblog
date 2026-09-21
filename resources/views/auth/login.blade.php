@extends('layouts.main')
@include('components.alerts')

@section('content')
    <div class="w-95">
        <form action="" method="post">
            @csrf
        <div class="mb-5">
            <label for="email">E-mail: </label>
            <br>
            <input class="w-full border p-2 rounded" type="email" name="email" id="email">
        </div>
        <div class="mb-5">
            <label for="password">Wachtwoord: </label>
            <br>
            <input class="border w-full p-2 rounded" type="password" name="password" id="password">
        </div>

        <input class="text-white bg-gray-500 px-4 py-1 cursor-pointer rounded" type="submit" value="Login">
        </form>
    </div>
@endsection