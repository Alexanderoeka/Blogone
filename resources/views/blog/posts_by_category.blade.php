@extends('layouts.app')

@section('content')
    <section>
        <div class="container listofposts">
            <div>
                @foreach ($postsbyCategory as $item)
                    <div class="row postss">

                        <a class="link" href="#">{{ $item->title }}</a>
                        <div>Описание :{{ $item->description }}</div>

                    </div>
                @endforeach
                <div>
                    @if ($postsbyCategory->total() > $postsbyCategory->count())
                        {{ $postsbyCategory->links() }}
                </div>
                @endif
            </div>
        </div>

    </section>
@endsection
