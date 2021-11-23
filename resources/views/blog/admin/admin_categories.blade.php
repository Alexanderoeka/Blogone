@extends('blog.admin.layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <table>
                    @foreach ($categories as $item)
                        <div class="item-link">
                            {{ $item->title }}
                        </div>

                    @endforeach
                </table>
            </div>
        </div>
    </section>



@endsection
