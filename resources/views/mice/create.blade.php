@extends('layout')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr><th>Mouse</th><th>Antigen</th><th>Days</th><th>Gender</th><th>Adjuvant</th><th>Injection Date</th><th>Harvest Date</th><th>Final Titer</th></tr>
        </thead>
        <tbody>
        @foreach($project->mice()->latest()->get() as $mouse)
            <tr><td>{{$mouse->name}}</td><td>{{$mouse->antigen}}</td><td>{{$mouse->days}}</td><td>{{$mouse->gender}}</td><td>{{$mouse->adjuvant}}</td><td>{{$mouse->injectionDate}}</td><td>{{$mouse->harvestDate}}</td><td>{{$mouse->titer}}</td></tr>
        @endforeach
        </tbody>
    </table>
    <hr>


    <div class="col-md-6">
    {!! Form::open(['url' => 'mice']) !!}
        @include('mice.addmouseform', ['submitButtonText' => 'Add Mouse'])
    {!! Form::close() !!}
    </div>

    <div class="col-md-6">
        @include('errors.list')
    </div>
@stop