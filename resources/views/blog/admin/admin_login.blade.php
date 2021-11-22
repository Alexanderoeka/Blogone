
<section>
    <div class="container">
        <div class="row">
            <h3>Аутентификация администратора</h3>
            <form method="POST" action="{{ route('admin.checklogin') }}">
                @csrf
                @method('POST')
                <lable for="name">Логин</lable><input class="form-control" id="name" type="text" name="name" />

                <lable for="password">Пароль</lable><input class="form-control" id="password" type="password"
                    value="" name="password" />

                <input type="submit" value="Войти" />
            </form>
        </div>
    </div>
</section>
