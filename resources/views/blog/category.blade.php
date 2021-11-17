@extends('layouts.app')
@section('content')

    <section>
        <div class="container">
            <div class="list-group linkss ">
                @foreach ($categories as $item)

                    <a class="list-group-item list-group-item-action"
                        href="{{ route('categories.posts', $item->id) }}">{{ $item->title }}</a>

                @endforeach
            </div>
        </div>
    </section>

@endsection
