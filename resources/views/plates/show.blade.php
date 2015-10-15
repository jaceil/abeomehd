@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h2>{{$plate->name}}</h2>
            <hr>
            <p>
                Dated: {{$plate->created_at}} <br>
                Description: {{$plate->description}}<br>
            </p>
        </div>
        <div class="col-md-8 gallery">
            @foreach($plate->photos->chunk(3) as $set)
            <div class="row">
                @foreach($set as $photo)
                    <div class="col-md-4 gallery_image">
                        <a href="#" class="thumbnail">
                            <img src="/{{$photo->thumbnail_path}}" alt="" >
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
