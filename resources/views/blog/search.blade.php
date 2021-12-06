@extends('layouts.app')

@section('content')

    <section>

        <div class="container">
            <div class="row searc">
                <form method="POST" action="{{route('search.posts')}}">
                    @csrf
                <div class="col-6">
                    Категория
                    <select class="form-select" name="category_id">
                        <option selected /> Любая
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" />{{ $category->title }}
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    Автор
                    <input class="form-control" type="text" name="name" value="" />
                </div>
                Название статьи
                <input class="form-control" type="text" name="title" value="" />


            </div>
        </form>
            <div class="row">
                <table class="table">
                    <tr>
                        <th>№</th>
                        <th>Название</th>
                        <th>Автор</th>
                        <th>Категория</th>
                    </tr>
                    @if(isset($posts))
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category->title}}</td>
                    </tr>
                    @endforeach
                    @endif
                </table>
            </div>
        </div>

    </section>


@endsection
