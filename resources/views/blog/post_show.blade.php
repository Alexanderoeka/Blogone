@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class=" post">
                    <h4>Тема : {{ $post->title }}</h4>
                    @if (!empty(session()->get('success')))
                        <p class="text-success">{{ session()->get('success') }}</p>
                    @endif
                    <div>Категория : {{ $post->category->title }}</div>
                    <div>Автор : {{ $post->user->name }}</div>
                    <div>Описание : {{ $post->description }}</div>
                    <lable for="text">Содержание :</lable>
                    <div id="text" style="word-break: break-all;"> {{ $post->content }}</div>
                    @if (Auth::id() == $post->user_id)
                        <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Редактировать</a>
                    @endif
                </div>
            </div>
        </div>
    </section>


@endsection
