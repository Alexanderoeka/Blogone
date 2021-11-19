@extends('layouts.app')

@section('content')
    <section>
        <div class="container listofposts">
            <div class="cont">
                <h5>Категория : {{ $category->title }}</h5>
                @foreach ($postsbyCategory as $item)
                    <div class="row postss">

                        <a class="link" href="{{ route('post.show', $item->id) }}">{{ $item->title }}</a>
                        <div> Автор : {{ $item->user->name }}</div>
                        <div>Описание :{{ $item->description }}</div>

                    </div>
                @endforeach
                <div style="margin-top:2%;">
                    @if ($postsbyCategory->total() > $postsbyCategory->count())
                        {{ $postsbyCategory->links() }}
                </div>
                @endif
            </div>
        </div>

    </section>
@endsection
