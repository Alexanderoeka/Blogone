@extends('layouts.app')

@section('content')

    <section>

        <div class="container">
            <form method="POST" action="{{ route('search.posts') }}">
                @csrf
                <div class="row searc searco">

                    <div class="col-3">
                        Категория
                        <select class="form-select" name="category_id">
                            <option selected value="0" /> Любая
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if($data['category_id']==$category->id) selected @endif />{{ $category->title }}
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        Автор
                        <input class="form-control" type="text" name="name" value="{{$data['name']}}" />
                    </div>


                </div>
                <div class="row searct">
                    <div class="col-5">

                        Название статьи

                        <input class="form-control " type="text" name="title" value="{{$data['title']}}" />

                    </div>
                    <div class="col-1" style="margin-top:2.4%;">
                        <input type="submit" class="btn btn-primary" value="поиск"/>
                    </div>
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
                    @if (isset($posts))
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->category->title }}</td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>

    </section>


@endsection
