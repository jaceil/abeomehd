@extends('layout')

@section('content')
    <h2>Plates for Mouse {{$mouse->name}}</h2>
    <table class="table table-bordered">
        <thead>
        <tr><th>Plate ID</th><th>Plate Type</th><th>Date</th><th>Info</th><th>Processed?</th></tr>
        </thead>
        <tbody>
        @foreach($mouse->plates()->get() as $plate)
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

    <h2>Add New Plate</h2>
    <div class="col-md-6">
    {!! Form::open(['url' => 'plates']) !!}

        <div class="form-group">
            {!! Form::hidden('mouse_id', $mouse->id, ['class' => 'form-control']) !!}
        </div>
        <!--Name text field -->

        <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!--Plate_type text field -->

        <div class="form-group">
                {!! Form::label('plate_type', 'Plate Type:') !!}
                {!! Form::select('plate_type', [
                'Screen' => 'Screen',
                'Confirmation' => 'Confirmation',
                'Sequence' => 'Sequence',
                'Humanization' => 'Humanization',
                'Test' => 'Test'
                ], ['class' => 'form-control']) !!}
        </div>

        <!--Description text field -->

        <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
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
    </div>
@stop