@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div> {{Auth::user()->name}}</div>
            <div> {{Auth::user()->email}}</div>
            <div> {{Auth::user()->password}}</div>

        </div>
    </div>
</section>

@endsection
