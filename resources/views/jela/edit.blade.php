@extends('layouts.app')

@section('content')

    <h1 class="pt-3">Uredi objavu</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\JelaController@update', $jelo->id], 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('naziv', 'Naziv')}}
            {{Form::text('naziv', $jelo->naziv, ['class'=>'form-control', 'placeholder'=>'Naziv jela'])}}
        </div>
        <div class="form-group">
            {{Form::label('opis', 'Opis')}}
            {{Form::textarea('opis', $jelo->opis, ['class'=>'form-control', 'placeholder'=>'Opis jela'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Uredi', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection