@extends('layouts.app')
@section('content')
        <h1>Jela Svijeta</h1>
        <p>{{$title}}</p>
        @if (count($sastojci)>0)
        <ul>
            @foreach($sastojci as $sastojak)
                <li>{{$sastojak}}</li>
            @endforeach
        </ul>
        @endif
@endsection