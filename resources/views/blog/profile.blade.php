@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row profile">
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


                    <div>Имя : <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" />
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

            <div class="row">
                <h4>Опубликованные статьи</h4>
                <table class="table">
                    <tr>
                        <th>№</th>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Дата создания</th>
                    </tr>
                    @foreach ($postsfromUser as $post)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><a class="nav-link"
                                    href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                            </td>
                            <td>{{ $post->category->title }}</td>
                            <td>{{ $post->created_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>


        </div>



    </section>

@endsection
