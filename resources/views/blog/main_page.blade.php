@extends('layouts.app')
@section('content')
    <section>
        <div class="container">

            <div class="cont">
                <h4>Последние 10 статей</h4>
                @foreach ($lastPosts as $item)
                    <div class="row postss">

                        <a class="link" href="{{ route('post.show', $item->id) }}">{{ $item->title }}</a>
                        <div>Категория : {{ $item->category->title }}</div>
                        <div>Автор : {{ $item->user->name }}</div>
                        <div>Описание :{{ $item->description }}</div>


                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
