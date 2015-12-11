@extends('layout')

@section('content')
    <h2>Plates for Mouse {{$plate->mouse->name}}</h2>
    <table class="table table-bordered">
        <thead>
        <tr><th>Plate ID</th><th>Plate Type</th><th>Date</th><th>Info</th><th>Processed?</th></tr>
        </thead>
        <tbody>
        @foreach($plate->mouse->plates()->get() as $plate)
            <tr><td><a href="{{action('PlatesController@show', [$plate->id])}}">{{$plate->name}}</a></td><td>{{$plate->plate_type}}</td><td>{{$plate->created_at}}</td><td>{{$plate->description}}</td>
                <td>
                    @if($plate->isProcessed === '1')
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr>

    <h2>Edit {{$plate->name}}</h2>
    <div class="col-md-6">
        {!! Form::model($plate, ['method' => 'PATCH', 'action' => ['PlatesController@update', $plate->id]]) !!}
            <div class="form-group">
                {!! Form::hidden('mouse_id', $plate->mouse->id, ['class' => 'form-control']) !!}
            </div>
            @include('plates.plateform', ['submitButtonText' => 'Edit Plate'])
        {!! Form::close() !!}
    </div>

    <div class="col-md-6">
        @include('errors.list')
    </div>


@stop