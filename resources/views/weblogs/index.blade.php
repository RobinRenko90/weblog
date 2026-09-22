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
                <b class="text-lg">{{ $weblog->title }}</b>
                <p>{{ $weblog->description }}</p>
                <i class="text-sm">{{ $weblog->created_at }}</i>
            </a>
        @empty
            <p class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0 mt-5">Geen weblogs gevonden</p>
        @endforelse
    </div>
@endsection