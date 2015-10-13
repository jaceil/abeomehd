@extends('layout')

@section('content')
    <h2>{{$plate->name}}</h2>
    <hr>
    <p>
        Dated: {{$plate->created_at}} <br>
        Description: {{$plate->description}}<br>
    </p>
    <br><br>
    <form action="foobar" method="POST" class="dropzone"></form>
@stop

