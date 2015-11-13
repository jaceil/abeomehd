@extends('layout')

@section('styles')
    <style>
    .btn {
        padding: 0px 6px;
    }
    </style>
@stop

@section('content')
    <h2>{{ $project->name }}</h2>
    <hr>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="panel-toggle" data-toggle="collapse" data-parent="#accordion1" href="#projectMice">
                        Project Mice
                    </a>
                    <a href="{{action('MouseController@create', [$project->id])}}"><button class="panel-toggle btn btn-success pull-right">+ Add Mouse</button></a>
                </h4>
            </div>
            <div id="projectMice" class="panel-body collapse">
                <div class="panel-inner">
                    <div class="panel-group" id="accordion2">
                        @foreach($mice as $mouse)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a class="panel-toggle" data-toggle="collapse" data-parent="#accordion2" href="#{{$mouse->name}}">
                                        {{$mouse->name}}
                                    </a>
                                </h4>
                            </div>

                            <div id="{{$mouse->name}}" class="panel-body collapse">
                                <div class="panel-inner">

                                   <table class="table table-bordered">
                                       <thead>
                                        <tr><th>Plate ID</th><th>Type</th><th>Info</th><th>Date</th><th>Processed?</th></tr>
                                       </thead>
                                       <tbody>
                                       @foreach($mouse->plates()->get()->all() as $plate)
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
                                    <!-- Split button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success"><a href="{{action('PlatesController@create', [$mouse->id])}}">+ Add Plates</a></button>
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                    {{--<a href="{{action('PlatesController@create', [$mouse->id])}}"><button class="panel-toggle btn btn-success">+ Add Plates</button></a>--}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="panel-toggle" data-toggle="collapse" data-parent="#accordion1" href="#projectHits">
                        Project Hits
                    </a>
                </h4>
            </div>
            <div id="projectHits" class="panel-body collapse">
                <div class="panel-inner">
                    <table class="table table-bordered">
                        <thead>
                            <tr><th>ID</th><th>Mouse</th><th>Plate</th><th>Well</th><th>Abeome #</th><th>Status</th></tr>
                        </thead>
                        <tbody>
                            @foreach($project->hits as $hit)
                                <tr><td>{{$hit->id}}</td><td>{{$hit->mouse->name}}</td><td>{{$hit->plate->name}}</td><td>{{$hit->well}}</td><td>{{$hit->abmno}}</td><td>{{$hit->status}}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            //when a group is shown, save it as the active accordion group
            $("#accordion").on('shown.bs.collapse', function () {
                var active = $("#accordion .in").attr('id');
                $.cookie('activeAccordionGroup', active);
                //  alert(active);
            });
            $("#accordion").on('hidden.bs.collapse', function () {
                $.removeCookie('activeAccordionGroup');
            });
            var last = $.cookie('activeAccordionGroup');
            if (last != null) {
                //remove default collapse settings
                $("#accordion .panel-collapse").removeClass('in');
                //show the account_last visible group
                $("#" + last).addClass("in");
            }
        });
    </script>
@stop

