@extends('/layouts.main')

@section('content')
    <p class="mb-5"><a class="underline" href="{{ route('weblogs.index') }}">terug naar overzicht</a></p>
    <div class="flex justify-between">
        <div>
            <h3 class="text-2xl font-bold">{{ $weblog->title }}</h3>
            <p>{{ $weblog->description }}</p>
        </div>

        <div>
        <strong>Comments:</strong>
            <div class="text-xs">
                <ul>
                    <li><p>Mijn eerst comment op de log <br> <i>Robin - 18 sept 2026</i></p></li>
                @foreach($comments as $comment)
                    <li class="mt-2">
                        <p>
                            {{ $comment->content }}
                            <br>
                            <i>{{ $comment->created_at }}</i>
                        </p>
                    </li>
                @endforeach
                </ul>
            </div>

            <div class="mt-5">
                <form action="{{ route('comment.store', $weblog->id) }}" method="post">
                    <textarea class="border w-75 p-1" name="content" id="content" rows=4  placeholder="Laat een bericht achter...."></textarea>
                    <br>
                    <input class="p-1 cursor-pointer bg-gray-400 text-white rounded" type="submit" value="Plaats commentaar">
                    <input type="hidden" name="user_id" value='1'>
                    <input type="hidden" name="weblog_id" value="{{ $weblog->id }}">
                </form>
            </div>

        </div>
    </div>

    <div class="mt-5 flex gap-5">
       <a class="underline" href="{{ route('weblogs.edit', $weblog->id) }}">Bewerken</a>
        <form action="" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="underline cursor-pointer"
                onclick="return confirm('Weet je zeker dat je deze log wilt verwijderen?')">
                Verwijderen
            </button>
        </form>
    </div>    
@endsection