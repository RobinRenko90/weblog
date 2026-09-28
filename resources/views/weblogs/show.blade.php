@extends('/layouts.main')

@section('content')
    <p class="mb-15"><a class="underline" href="{{ route('weblogs.index') }}">Terug naar overzicht</a></p>
    <div class="flex justify-between">
        <div class="pr-20">
            @if(count($weblog->categories))
                <div class="flex gap-2 mb-2">
                    @foreach($weblog->categories as $category)
                        <p class="rounded bg-green-300 text-xs h-fit px-2 py-1">{{ $category->name }}</p>
                    @endforeach
                </div>
             @endif   
            <h3 class="text-2xl font-bold mb-4 flex gap-2 items-center">
                {{ $weblog->title }}
                @if($weblog->premium)
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4M4.5 7A1.5 1.5 0 0 0 3 8.5v5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 11.5 7zM8 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3"/>
                    </svg>
                @endif   
            </h3>
            <p>{{ $weblog->description }}</p>
            @if($weblog->image)
               <img class="mt-5" src="{{ asset($weblog->image) }}">
            @endif
            @if($weblog->user_id == Auth::user()->id)
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
            @endif
        </div>

        <div>
            <strong>Comments:</strong>
            <div class="text-sm mb-2">
                <ul>
                @forelse($comments as $comment)
                    <li class="mb-2">
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