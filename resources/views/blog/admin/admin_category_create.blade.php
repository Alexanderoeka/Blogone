@extends('blog.admin.layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="creatc">
                    <h3>Создание новой категории</h3>
                    <form method="POST" action="{{ route('admin.category.store') }}">
                        @csrf
                        Название категории
                        <input type="text" class="form-control" name="title" />
                        Описание
                        <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                        <input type="submit" class="btn btn-primary" style="margin-top:3%;" />
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection
