@extends('layouts.app')
@section('content')
        <h1>Jela Svijeta</h1>
        <p>{{$title}}</p>
        @if (count($sastojci)>0)
        <ul class="list-group">
            @foreach($sastojci as $sastojak)
                <li class="list-group-item">{{$sastojak}}</li>
            @endforeach
        </ul>
        @endif
@endsection