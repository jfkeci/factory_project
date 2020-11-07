@extends('layouts.app')

@section('content')
    <h1 class="pt-3">Uredi Sastojak</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\SastojciController@update', $sastojak->id], 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('naziv', 'Naziv')}}
            {{Form::text('naziv', $sastojak->naziv, ['class'=>'form-control', 'placeholder'=>'Naziv sastojka'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Objavi', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection