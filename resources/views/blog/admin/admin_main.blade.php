@extends('blog.admin.layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <h3>Вы находитесь в админке, под аккаунтом {{session()->get('admin')->name}}

                    <div>Почта : {{session()->get('admin')->email}}</div>

            </h3> </div>
    </div>

</section>

@endsection
