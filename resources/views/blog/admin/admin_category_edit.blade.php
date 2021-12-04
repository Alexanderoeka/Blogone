@extends('blog.admin.layouts.app')

@section('content')
    <section>
        <div class="container">
            @if (!empty(session()->get('success')))
                <div>{{session()->get('success')}}</div>
            @endif
            @if($errors)
                {{session()->get('errors')->getBag('error')}}
            @endif
            <div class="row titlee">
                <div class="col-6">
                    <h5>Редактирование категории : {{ $category->title }}</h5>
                </div>
                <div class="col-6"><a class="btn btn-dark"
                        href="{{ route('admin.category.destroy', $category->id) }}">Удалить категорию</a></div>
            </div>
            <div class="row profile">

                <form method="POST" action="{{ route('admin.category.save', $category->id) }}">
                    @csrf
                    <div>Название : <input type="text" name="title" value="{{ $category->title }}" required minlength="3"
                            class="form-control" />
                    </div>
                    <div>Описание : <textarea name="description" class="form-control" rows="10" required
                            minlength="10">{{ $category->description }}</textarea></div>
                    <input class="btn btn-primary" type="submit" value="Сохранить" />
                </form>
            </div>
        </div>
    </section>
@endsection
