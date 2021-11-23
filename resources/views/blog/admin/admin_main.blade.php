@extends('blog.admin.layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">Mdaaa {{ session()->get('admin') }} </div>
    </div>

</section>

@endsection
