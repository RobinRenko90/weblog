@extends('/layouts.main')

@section('content')
    <div class="grid gap-4">
        <a class="underline" href="{{ route('weblogs.create') }}">Weblog aanmaken</a>
        @foreach($weblogs as $weblog)
            <div class="">
                <b class="text-lg">{{ $weblog->title }}</b>
                <p>{{ $weblog->description }}</p>
                <i class="text-sm">{{ $weblog->created_at }}</i>
            </div>
        @endforeach
    </div>
@endsection