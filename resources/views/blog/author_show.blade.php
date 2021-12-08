@extends('layouts.app')


@section('content')


    <section class="container">
        <div class="row authr">
            <div>
                <h4>Автор : {{ $author->name }}</h4>
                <div>
                    Почта
                    <div class="">{{ $author->email }}</div>
                </div>
                Описание
                <div>{{ $author->description }}</div>

            </div>
            <div class="row" style="margin-top:6%">
                <h5>Посты автора</h5>
                <table class="table">
                    <tr>
                        <th>№</th>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Описание</th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><a class="nav-link"
                                    href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></td>
                            <td>{{ $post->category->title }}</td>
                            <td>{{ $post->description }}</td>
                        </tr>

                    @endforeach

                </table>
                @if ($posts->total() > $posts->count())
                    <div>{{ $posts->links() }}</div>
                @endif
            </div>
        </div>
    </section>




@endsection
