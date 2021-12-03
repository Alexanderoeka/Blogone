@extends('blog.admin.layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <table>
                    @foreach ($categories as $item)
                        <div class="item-link">
                            <a class="nav-link" href="{{ route('admin.category.edit', $item->id) }}"> {{ $item->title }}</a>
                        </div>

                    @endforeach
                </table>
            </div>
        </div>
    </section>



@endsection
