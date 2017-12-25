@extends('layouts.master')

@section('content')

    @include('layouts.nav')

    <div class="card">
        <img class="card-img-top" src="/images/person-2.jpg" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

@endsection