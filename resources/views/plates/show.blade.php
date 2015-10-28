@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            {{--<a href="{{action('PlatesController@destroy', [$plate->id, $plate->mouse->project->id])}}"><button class="btn btn-danger pull-right">Delete Table</button></a>--}}
            <h2>{{$plate->name}}</h2>
            {{$plate->description}}<br><br>
            <hr>
            <p>
                Mouse: {{$plate->mouse->name}} <br>
                Dated: {{$plate->created_at}} <br><br><br>

                {!! Form::open(['action' => 'PlatesController@storehits']) !!}
                        <!--Hiddens text field -->

                        <div class="form-group">
                                {!! Form::hidden('project_id', $plate->mouse->project_id, ['class' => 'form-control']) !!}
                                {!! Form::hidden('mouse_id', $plate->mouse->id, ['class' => 'form-control']) !!}
                                {!! Form::hidden('plate_id', $plate->id, ['class' => 'form-control']) !!}
                        </div>
                        <!--Hits text field -->
                    <div class="form-group">
                        {!! Form::label('wells', 'Hits:') !!}
                        {!! Form::select('wells[]', $wells, null, ['id' => 'hits', 'class' => 'form-control', 'multiple']) !!}
                    </div>

                    <!--  submit field -->
                    <div class="form-group">
                        {!! Form::submit('Add Hits', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                {!! Form::close() !!}
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
    <script>
        $('#hits').select2();
    </script>
@stop
