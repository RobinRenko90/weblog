@extends('layouts.main')

@section('content')
    <div class="border rounded p-5 w-150">
        <b class="text-xl">Premium abbonement</b>
        <ul style="list-style:disc" class="m-5">
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem, ipsum dolor.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste!</li>
        </ul>
        <form action="" method="post">
            @csrf

            @if(Auth::user()->subscribed == 0)
                <button class='bg-green-400 p-2 cursor-pointer text-white rounded' type="submit"
                    onclick="return confirm('Weet je zeker dat je deze abbonement wilt afsluiten?')">
                Nu betalen
                </button>
            @else
                <button class="bg-gray-400 p-2 cursor-pointer text-white rounded" disabled>Abbonement actief</button>
            @endif    
        </form>
    </div>

@endsection