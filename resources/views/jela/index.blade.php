@extends('layouts.app')

@section('content')
    <h1 class="pt-3">Jela</h1>
    @if (count($jela)>0)
        @foreach ($jela as $jelo)
            <div class="well pl-3">
            <h3><a href="/jela/{{$jelo->id}}">{{$jelo->naziv}}</a></h3>
                <small>Napisano: {{$jelo->created_at}}</small>
                <hr>
            </div>
        @endforeach
        {{$jela->links()}}
    @else
        <p>Nema objava</p>
    @endif
@endsection