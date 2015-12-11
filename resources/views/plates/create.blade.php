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
                    @if($plate->isProcessed == '1')
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <script>

                        </script>
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
        @include('plates.plateform', ['submitButtonText' => 'Add Plate'])
    {!! Form::close() !!}
    </div>

    <div class="col-md-6">
        @include('errors.list')
    </div>
@stop