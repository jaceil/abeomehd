@extends('layout')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr><th>Plate ID</th><th>Type</th><th>Info</th><th>Date</th><th>Processed?</th></tr>
        </thead>
        <tbody>
        @foreach($plates as $plate)
            <tr><td><a href="{{action('PlatesController@show', [$plate->id])}}">{{$plate->name}}</a></td><td>{{$plate->plate_type}}</td><td>{{$plate->description}}</td><td>{{$plate->created_at}}</td>
                <td>
                    @if($plate->isProcessed == '1')
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop