@extends('layouts.app')

@section('content')

    <h1 class="pt-3">Jela</h1>
    @if (count($jela)>0)
        @foreach ($jela as $jelo)
            <div class="well pl-3">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img src="/storage/cover_images/{{$jelo->cover_image}}" style="width: 100%;" alt="">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/jela/{{$jelo->id}}">{{$jelo->naziv}}</a></h3>
                        <small>Korisnik - {{$jelo->user->name}}  Objavio {{$jelo->created_at}}</small>
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
        {{$jela->links()}}
    @else
        <p>Nema objava</p>
    @endif

@endsection