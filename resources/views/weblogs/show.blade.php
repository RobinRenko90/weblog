@extends('/layouts.main')

@section('content')
    <p class="mb-15"><a class="underline" href="{{ route('weblogs.index') }}">Terug naar overzicht</a></p>
    <div class="flex justify-between">
        <div>
            @if(count($weblog->categories))
                <div class="flex gap-2 mb-2">
                    @foreach($weblog->categories as $category)
                        <p class="rounded bg-green-300 text-xs h-fit px-2 py-1">{{ $category->name }}</p>
                    @endforeach
                </div>
             @endif   
            <h3 class="text-2xl font-bold mb-4">{{ $weblog->title }}</h3>
            <p>{{ $weblog->description }}</p>

            <div class="mt-10 flex gap-5">
                <a class="px-2 py-1 cursor-pointer bg-blue-500 text-white rounded" href="{{ route('weblogs.edit', $weblog->id) }}">Bewerken</a>
                <form action="" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-2 py-1 cursor-pointer bg-red-500 text-white rounded"
                        onclick="return confirm('Weet je zeker dat je deze log wilt verwijderen?')">
                        Verwijderen
                    </button>
                </form>
            </div>    
        </div>

        <div>
            <strong>Comments:</strong>
            <div class="text-sm mb-2">
                <ul>
                @forelse($comments as $comment)
                    <li>
                        <p>
                            {{ $comment->content }}
                            <br>
                            <i class="text-xs">{{ $comment->created_at }}</i>
                        </p>
                    </li>
                @empty
                    <i>Nog geen comments geplaatst</i>
                @endforelse
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
@endsection