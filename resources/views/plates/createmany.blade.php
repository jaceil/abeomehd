@extends('layout')

@section('content')

    <h2>Add Many New Plates</h2>
    <div class="col-md-6">
        {!! Form::open(['action' => 'PlatesController@storeMany']) !!}
        <div class="form-group">
            {!! Form::hidden('mouse_id', $id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::hidden('plateNumber', $plateNumber, ['class' => 'form-control']) !!}
        </div>
        @include('plates.plateform', ['submitButtonText' => 'Add Plates'])
        {!! Form::close() !!}
    </div>

    <div class="col-md-6">
        @include('errors.list')
    </div>
@stop