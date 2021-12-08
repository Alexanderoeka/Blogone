@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <form method="POST" action="{{ route('post.save', $post->id) }}">
                @csrf

                <div class="row ediit">
                    Тема
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" />
                    Категория
                    <select name="category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $post->category_id) selected @endif /> {{ $category->title }}
                        @endforeach
                    </select>



                </div>
                <div class="row editdes">
                    Описание
                    <input type="text" name="description" value="{{ $post->description }}" class="form-control" />

                </div>
                <div class="row editare">
                    Содержание
                    <textarea name="content" class="form-control" rows=10>
                                {{ $post->content }}
                                </textarea>
                    <div style="text-align: center; margin-top:2%;">
                        <input type="submit" class="btn btn-primary" value="Сохранить" />
                    </div>
                </div>

            </form>
        </div>
    </section>

@endsection
