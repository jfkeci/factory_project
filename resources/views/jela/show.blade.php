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
        <small>Korisnik - {{$jelo->user->name}}  Objavio {{$jelo->created_at}}</small>
        <br>
        <a href="/jela/{{$jelo->id}}/edit" class="btn btn-success">Uredi</a>
    {!! Form::open(['action'=>['App\Http\Controllers\JelaController@destroy', $jelo->id], 'method'=>'POST', 'class'=>'pull-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
    </div>

    
@endsection