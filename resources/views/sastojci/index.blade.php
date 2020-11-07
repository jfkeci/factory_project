@extends('layouts.app')

@section('content')
    <h1 class="pt-3">Sastojci</h1>
    <a class="btn btn-success" href="/sastojci/create">Dodaj novi sastojak</a>
    <hr>
    @if (count($sastojci)>0)
        @foreach ($sastojci as $sastojak)
            <div class="well pl-3">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/sastojci/{{$sastojak->id}}">{{$sastojak->naziv}}</a></h3>
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
        {{$sastojci->links()}}
    @else
        <p>Nema sastojaka</p>
    @endif
@endsection