@extends('layout')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr><th>Mouse</th><th>Antigen</th><th>Gender</th><th>Adjuvant</th><th>Injection Date</th><th>Harvest Date</th><th>Final Titer</th></tr>
        </thead>
        <tbody>
        @foreach($mice as $mouse)
            <tr><td>{{$mouse->name}}</td><td>{{$mouse->antigen}}</td><td>{{$mouse->gender}}</td><td>{{$mouse->adjuvant}}</td><td>{{$mouse->injectionDate}}</td><td>{{$mouse->harvestDate}}</td><td>{{$mouse->titer}}</td></tr>
        @endforeach
        </tbody>
    </table>


@stop