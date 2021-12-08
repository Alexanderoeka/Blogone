@extends('layouts.app')

@section('content')

    <section>
        <div class="container">

            <form method="POST" action="{{route('authors.find')}}">
                @csrf
            <div class="row findd">

                Имя автора
                <div class="col-3" >
                <input type="text" name="name"    value="" class="form-control"/>
                </div>
                <div class="col-1">
                <input type="submit" value="Поиск" class="btn btn-primary" />
                </div>

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
