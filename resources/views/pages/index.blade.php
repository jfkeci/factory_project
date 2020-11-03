@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Dobrodošli</h1>
        <p class="lead">Jela Svijeta</p>
        <hr class="my-4">
        <p>{{ $paragraph }}</p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
      </div>
@endsection
