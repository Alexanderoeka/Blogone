@extends('layouts.app')


@section('content')


    <section class="container">
        <div class="row">

            <h4>Автор : {{ $author->name }}</h4>

            Почта
            <div class="">{{ $author->email }}</div>
            Описание
            <div>{{ $author->description }}</div>





        </div>
        <div class="row">
            <h5>Посты автора</h5>
            <table class="table">
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Описание</th>
                </tr>
                @foreach ($author->posts as $post)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a class="nav-link" href="{{route('post.show',$post->id)}}">{{$post->title}}</a></td>
                        <td>{{$post->category->title}}</td>
                        <td>{{$post->description}}</td>
                    </tr>

                @endforeach
            </table>
        </div>
    </section>




@endsection
