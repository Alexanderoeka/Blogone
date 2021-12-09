@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h3>Профиль</h3>
                    @if ($errors->any())
                        <div>

                            {{ $errors->all()[0] }}
                        </div>
                    @endif

                    @if (session()->get('success') != null)
                        <div>{{ session()->get('success') }}</div>
                    @endif
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        @method('POST')


                        <div>Имя : <input type="text" class="form-control" value="{{ Auth::user()->name }}"
                                name="name" />
                        </div>
                        <div>Почта : <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                name="email" />
                        </div>
                        <div>
                            О себе :
                            <textarea class="form-control" rows="5"
                                name="description">{{ Auth::user()->description }}</textarea>
                        </div>

                        <div>Новый пароль :
                            <input type="text" class="form-control" value="" name="npass1" />
                            Повторить пароль :
                            <input type="text" class="form-control" value="" name="npass2" />
                        </div>
                        <div>
                            Введите старый пароль для подтверждения изменений :
                            <input type="password" class="form-control" value="" name="ppass" />
                        </div>
                        <div>Аккаунт создан : {{ Auth::user()->created_at }}</div>
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </form>
                </div>



                <div class="col findtabl">
                    <form method="POST" action="{{ route('user') }}">
                        @csrf
                        <h6> Поиск по статьям</h6>

                        <div class="">
                            Категория
                            <select name="category_id" class="form-select">
                                <option value="0" selected>Любая
                                    @foreach ($categories as $category)

                                <option value="{{ $category->id }}"  @if(isset($query['category_id']) && $query['category_id'] == $category->id) selected  @endif >{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            Название статьи
                            <input type="text" name="title" value="@if(isset($query['title'])){{$query['title']}}@endif" class="form-control" />
                        </div>
                        <div class="" style="margin-top:1.9%;">
                            <input type="submit" value="Поиск" class="btn btn-primary">
                        </div>
                    </form>

                    <h4>Опубликованные статьи</h4>
                    <table class="table">
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Дата создания</th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><a class="nav-link"
                                        href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                                </td>
                                <td>{{ $post->category->title }}</td>
                                <td>{{ $post->created_at }}</td>
                            </tr>
                        @endforeach

                    </table>
                    @if ($posts->total() > $posts->count())
                        <div>{{ $posts->links() }}</div>
                    @endif
                </div>
            </div>


        </div>



    </section>

@endsection
