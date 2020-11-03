@extends('layouts.app')

@section('content')
    <div class="pt-3">
        <a href="/jela" class="btn btn-default"><strong>Go back</strong></a>
    </div>
    
    <div class="pt-3 pl-5">
        <h1 class="pt-3"><strong>{{$jelo->naziv}}</strong></h1>
        <div>
            {{$jelo->opis}}
        </div>
        <hr>
        <small>Napisano: {{$jelo->created_at}}</small>
    </div>
    
@endsection