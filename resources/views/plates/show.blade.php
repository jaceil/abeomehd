@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h2>{{$plate->name}}</h2>
            <hr>
            <p>
                Dated: {{$plate->created_at}} <br>
                Description: {{$plate->description}}<br>
            </p>
        </div>
        <div class="col-md-7">
            @foreach($plate->photos as $photo)
                <img src="{{$photo->path}}" alt="" >
            @endforeach
        </div>
    </div>
    <br><br>
    <form action="/plates/{{$plate->id}}/photos" method="POST" class="dropzone">
        {{ csrf_field() }}
    </form>
@stop

