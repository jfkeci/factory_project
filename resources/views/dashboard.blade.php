@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nadzorna ploča</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <a href="/jela/create" class="btn btn-primary">Nova objava</a>
                        <h3 class="pt-3">Vaše objave</h3>
                        @if (count($jela)>0)
                        <table class="table table-striped">
                            <tr>
                                <th>Naziv</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($jela as $jelo)
                                <tr>
                                    <td>{{$jelo->naziv}}</td>
                                    <td><a href="/jela/{{$jelo->id}}/edit"  class="btn btn-success">Uredi</a></td>
                                    <td>
                                        {!! Form::open(['action'=>['App\Http\Controllers\JelaController@destroy', $jelo->id], 'method'=>'POST', 'class'=>'pull-right']) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {!! Form::close() !!}    
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                            <p>Nemate objava</p>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
