@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h2>{{$plate->name}}</h2>
            {{$plate->description}}<br>
            <hr>
            <p>
                Mouse: {{$plate->mouse->name}} <br>
                Dated: {{$plate->created_at}} <br>

            </p>
        </div>
        <div class="col-md-8 gallery">
            @foreach($plate->photos->chunk(3) as $set)
            <div class="row">
                @foreach($set as $photo)
                    <div class="col-md-4 gallery_image">
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
@stop
