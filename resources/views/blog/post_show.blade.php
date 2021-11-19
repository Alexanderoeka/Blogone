@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row d-flex justify-content-center" ">
                    <div class=" post">
                <h4>Тема : {{ $post->title }}</h4>

                <div>Категория : {{ $post->category->title }}</div>
                <div>Автор : {{$post->user->name}}</div>
                <div>Описание : {{ $post->description }}</div>
                <lable for="text">Содержание :</lable>
                <div id="text" style="word-break: break-all;"> {{ $post->content }}</div>
            </div>
        </div>
        </div>
    </section>


@endsection
