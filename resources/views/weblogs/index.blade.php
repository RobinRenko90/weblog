@extends('/layouts.main')

@section('content')
    @include('components.alerts')
    <div class="grid gap-4 pt-4">
        <div class="flex justify-between">
            <a class="underline w-50" href="{{ route('weblogs.create') }}">Weblog aanmaken</a>
            <select class="border rounded p-2" name="category" onchange="window.location.href = this.value;" >
                <option value="{{ request()->url() }}"  @selected(!request()->query('category'))>Filteren op categorie</option>
                @foreach($categories as $category)
                    <option 
                        value="{{ request()->fullUrlWithQuery(['category' => $category->name]) }}"
                        @selected(request()->query('category') === $category->name)
                        >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        @forelse($weblogs as $weblog)
            <a href="{{ route('weblogs.show', $weblog->id) }}" class="border p-2 rounded-xl">
                <b class="text-lg flex items-center gap-2">
                    {{ $weblog->title }}
                    @if($weblog->user_id == Auth::user()->id)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    @endif
                    @if($weblog->premium)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4M4.5 7A1.5 1.5 0 0 0 3 8.5v5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 11.5 7zM8 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3"/>
                        </svg>
                    @endif    
                </b>

                <p>{!! Str::words($weblog->description, 20, '...') !!}</p>
                <i class="text-sm">{{ $weblog->created_at }}</i>
            </a>
        @empty
            <p class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0 mt-5">Geen weblogs gevonden</p>
        @endforelse
    </div>

    {{ $weblogs->links() }}
@endsection