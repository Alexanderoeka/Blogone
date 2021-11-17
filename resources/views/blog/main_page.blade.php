@extends('layouts.app')
@section('content')
    <section>
        <div class="container">

            <div class="cont">
                @foreach ($lastPosts as $item)
                    <div class="row postss">

                        <a class="link" href="#">{{ $item->title }}</a>
                        <div>Категория : {{ $item->category_id }}</div>
                        <div>Описание :{{ $item->description }}</div>


                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
