@extends('blog.admin.layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row categr">
            <div>
                <a class="btn btn-secondary" href="{{route('admin.category.create')}}">Создать категорию</a>
            </div>
                    @foreach ($categories as $item)
                        <div class="item-link">
                            <a class="nav-link categr" href="{{ route('admin.category.edit', $item->id) }}"> {{ $item->title }}</a>
                        </div>

                    @endforeach

            </div>
        </div>
    </section>



@endsection
