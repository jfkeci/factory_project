@extends('layouts.app')

@section('content')
    <h1 class="pt-3">Nova objava</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\JelaController@store', 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('naziv', 'Naziv')}}
            {{Form::text('naziv', '', ['class'=>'form-control', 'placeholder'=>'Naziv jela'])}}
        </div>
        <div class="form-group">
            {{Form::label('opis', 'Opis')}}
            {{Form::textarea('opis', '', ['class'=>'form-control', 'placeholder'=>'Opis jela'])}}
        </div>
        <div class="form-group">
            <h4>Sastojci</h4>
        <div>
            @if (count($sastojci)>0)
                @foreach ($sastojci as $sastojak)
                    {!! Form::label($sastojak->id, $sastojak->naziv) !!}
                    {!! Form::checkbox('sastojci[]', $sastojak->id) !!}
                    <br>
                @endforeach
            @endif
        </div>   
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Objavi', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection