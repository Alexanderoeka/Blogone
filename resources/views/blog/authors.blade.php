@extends('layouts.app')

@section('content')

    <section>
        <div class="container">

            <form method="POST" action="{{route('authors.find')}}">
                @csrf
            <div class="row">

            </div>
            </form>
            <div class="row">

                <table class="table">
                    <tr>
                        <th>№</th>
                        <th>Имя</th>
                        <th>Почта</th>

                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a class="nav-link" href="{{ route('author',$user->id) }}">{{ $user->name }}</a></td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach


                </table>

            </div>
        </div>
    </section>

@endsection
