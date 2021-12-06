@extends('blog.admin.layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                @if ($errors)
                    {{ implode($errors->get('error')) }}
                @endif
                @if (!empty(session()->get('success')))
                    {{ session()->get('success') }}
                @endif
            </div>
            <div class="row">

                <div>
                    <a class="btn btn-secondary" href="{{ route('admin.category.create') }}">Создать категорию</a>
                </div>
                @foreach ($categories as $item)
                    <div class="item-link ">
                        <a class="btn btn-link categr " href="{{ route('admin.category.edit', $item->id) }}">
                            {{ $item->title }}</a>
                    </div>

                @endforeach

            </div>
        </div>
    </section>



@endsection
