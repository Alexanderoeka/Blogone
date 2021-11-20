@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row profile">
                <form method="POST" action="{{route('user.store')}}">
                    @csrf
                    @method('POST')


                    <div>Имя : <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" />
                    </div>
                    <div>Почта : <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                            name="email" />
                    </div>
                    <div>
                        О себе :
                        <textarea class="form-control" rows="5" name="description">{{Auth::user()->description}}</textarea>
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
        </div>
    </section>

@endsection
