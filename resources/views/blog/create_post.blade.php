@extends('layouts.app')
@section('content')
    <section>
        <div class="container">

            <h3>Создание поста</h3>
            <form class="form" method="GET" action="{{ route('post.store') }}">
                @csrf
                <div class="row post cont">
                    <lable for="title">Название</lable>
                    <input class="form-control" type="text" id="title" name="title" value="" />
                    <div hidden>
                        <lable for="user_id">Автор</lable>
                        <input class="form-control" type="text" id="user_id" name="user_id" value="{{ Auth::id() }}" />
                    </div>
                    <lavle for="category">Категория</lable>
                    <select name="category_id" id="category" class="form-select" style="margin-top:2%;">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row desc">
                    <lable for="description">Описание</lable>
                    <textarea class="form-control" " id=" description" name="description"></textarea>
                </div>
                <div class="row contt">
                    <lable for="content">Контент</lable>
                    <textarea class="form-control" id="content" name="content" value="" placeholder="Введите текст статьи"
                        rows="10"></textarea>

                    <input class="btn btn-primary btnn" type="submit" value="Создать" />
                </div>

            </form>

        </div>
    </section>

@endsection
