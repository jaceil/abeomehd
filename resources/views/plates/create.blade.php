@extends('layout')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr><th>Plate ID</th><th>Date</th><th>Info</th><th>Processed?</th></tr>
        </thead>
        <tbody>
        @foreach($plates as $plate)
            <tr><td><a href="{{action('PlatesController@show', [$plate->id])}}">{{$plate->name}}</a></td><td>{{$plate->created_at}}</td><td>{{$plate->description}}</td>
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

    {!! Form::open() !!}

        <div class="form-group">
            {!! Form::hidden('mouse_id', $plates->first()->mouse_id, ['class' => 'form-control']) !!}
        </div>
        <!--Name text field -->

        <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!--Plate_type text field -->

        <div class="form-group">
                {!! Form::label('plate_type', 'Plate Type:') !!}
                {!! Form::text('plate_type', null, ['class' => 'form-control']) !!}
        </div>

        <!--Description text field -->

        <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>

        <!-- text field -->

        <div class="form-group">
                {!! Form::hidden('isProcessed', '0', ['class' => 'form-control']) !!}
        </div>

        <!--  submit field -->
        <div class="form-group">
            {!! Form::submit('Add Plate', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@stop