@extends('layout')

@section('content')
    <h2>Mouse {{$mouse->name}}</h2>
    <table class="table table-bordered">
        <thead>
        <tr><th>Mouse</th><th>Antigen</th><th>Days</th><th>Gender</th><th>Adjuvant</th><th>Injection Date</th><th>Harvest Date</th><th>Final Titer</th></tr>
        </thead>
        <tbody>
        @foreach($mouse->project->mice()->latest()->get() as $mouse)
            <tr><td>{{$mouse->name}}</td><td>{{$mouse->antigen}}</td><td>{{$mouse->days}}</td><td>{{$mouse->gender}}</td><td>{{$mouse->adjuvant}}</td><td>{{$mouse->injectionDate}}</td><td>{{$mouse->harvestDate}}</td><td>{{$mouse->titer}}</td></tr>
        @endforeach
        </tbody>
    </table>
    <hr>

    <h2>Edit {{$mouse->name}}</h2>
    <div class="col-md-6">
        {!! Form::model($mouse, ['method' => 'PATCH', 'action' => ['MouseController@update', $mouse->id]]) !!}
            @include('mice.editmouseform', ['submitButtonText' => 'Edit Mouse'])
        {!! Form::close() !!}
    </div>

    <div class="col-md-6">
        @include('errors.list')
    </div>


@stop