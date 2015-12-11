@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            {{--<a href="{{action('PlatesController@destroy', [$plate->id, $plate->mouse->project->id])}}"><button class="btn btn-danger pull-right">Delete Table</button></a>--}}
            <h2>{{$plate->name}} </h2>
            {{$plate->description}}<br>
            <a href="{{action('PlatesController@edit', [$plate->id])}}">Edit</a>  <a href="{{action('PlatesController@destroy', [$plate->id])}}">Delete</a><br>
            <hr>
            <p>
                Mouse: {{$plate->mouse->name}} <br>
                Dated: {{$plate->created_at}} <br><br><br>

                {!! Form::open(['action' => 'PlatesController@storehits']) !!}
                    @include('plates._form')
                {!! Form::close() !!}
            </p>
        </div>
        <div class="col-md-8 gallery">
            @foreach($plate->photos->chunk(3) as $set)
            <div class="row">
                @foreach($set as $photo)
                    <div class="col-md-4 gallery_image">
                        <form method="POST" action="/plate-photos/{{$photo->id}}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit">DELETE</button>
                        </form>

                        <a href="/{{$photo->path}}" class="thumbnail" data-lity>
                            <img src="/{{$photo->thumbnail_path}}" alt="" >
                            <div class="caption">
                                <p>{{$photo->caption}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
    <br><br>
    <form id="addPhotosForm" action="/plates/{{$plate->id}}/plate-photos" method="POST" class="dropzone">
        {{ csrf_field() }}
    </form>
@stop

@section('scripts')
   <script>
       Dropzone.options.addPhotosForm = {
        paramName: 'photo',
        maxFilesize: 3,
        acceptedFiles: '.jpg, .jpeg, .png, .bmp'
    };
   </script>
    <script>
        $('#hits').select2();
    </script>
@stop
