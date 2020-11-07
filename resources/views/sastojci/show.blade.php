@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-4">
      <div class="pt-3">
         <a href="/sastojci" class="btn btn-default"><strong>Go back</strong></a>
      </div>
      <div class="pt-3 pl-5">
         <h1 class="pt-3"><strong>{{$sastojak->naziv}}</strong></h1>
      </div>
      <small>Objavljeno - {{$sastojak->created_at}}</small>
      @if (!Auth::guest())
      {!! Form::open(['action'=>['App\Http\Controllers\SastojciController@destroy', $sastojak->id], 'method'=>'POST', 'class'=>'pull-right']) !!}
      {{Form::hidden('_method', 'DELETE')}}
      <a href="/sastojci/{{$sastojak->id}}/edit" class="btn btn-success">Uredi</a>  {{Form::submit('Obriši',['class'=>'btn btn-danger'])}} 
      {!! Form::close() !!}
      @endif
      <hr>
   </div>
   <div class="col-8">
      <div class="pt-3">
         <h3>Jela koja sadrže ovaj sastojak</h3>
         @if (count($sastojak->jela)>0)
         @foreach ($sastojak->jela as $jelo)
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
         @else
         <p>Nema objava</p>
         @endif
      </div>
   </div>
</div>
@endsection