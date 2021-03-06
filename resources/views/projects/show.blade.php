@inject('statusBar', 'App\statusbar')
@extends('layout')

@section('styles')
    <style>
        .btn {
            padding: 0 6px;
        }
    </style>
@stop

@section('content')
    <h2>{{ $project->name }}</h2>
    <hr>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default accordion-panel">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="panel-toggle" data-toggle="collapse" href="#projectMice">
                        Project Mice
                    </a>
                    <a href="{{action('MouseController@create', [$project->id])}}">
                        <button class="panel-toggle btn btn-success pull-right">+ Add Mouse</button>
                    </a>
                </h4>
            </div>
            <div id="projectMice" class="panel-body collapse">
                <div class="panel-inner">
                    <div class="panel-group" id="mouseAccordion">
                        @foreach($mice as $mouse)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="panel-toggle"
                                           data-toggle="collapse"
                                           data-parent="#mouseAccordion" href="#mouse-{{$mouse->name}}">
                                            {{$mouse->name}}
                                        </a>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="{{$statusBar->getStatus($mouse)}}"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="width:{{$statusBar->getStatus($mouse)}}%">
                                            {{$statusBar->getStatus($mouse)}}% Complete
                                        </div>
                                        </div>
                                    </h4>
                                </div>

                                <div id="mouse-{{$mouse->name}}" class="panel-body collapse">
                                    <div class="panel-inner">

                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Plate ID</th>
                                                <th>Type</th>
                                                <th>Info</th>
                                                <th>Date</th>
                                                <th>Processed?</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($mouse->plates()->get()->all() as $plate)
                                                <tr>
                                                    <td>
                                                        <a href="{{action('PlatesController@show', [$plate->id])}}">{{$plate->name}}</a>
                                                    </td>
                                                    <td>{{$plate->plate_type}}</td>
                                                    <td>{{$plate->description}}</td>
                                                    <td>{{$plate->created_at}}</td>
                                                    <td>
                                                        @if($plate->isProcessed == '1')
                                                            <span class="glyphicon glyphicon-ok"
                                                                  aria-hidden="true"></span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success"><a
                                                        href="{{action('PlatesController@create', [$mouse->id])}}">+ Add
                                                    Plates</a></button>
                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    {!! Form::open(['action' => 'PlatesController@manyPlates']) !!}
                                                    <div class="form-group">
                                                        {!! Form::hidden('mouse_id', $mouse->id, ['class' => 'form-control']) !!}
                                                    </div>
                                                    <!--Number text field -->

                                                    <div class="form-group">
                                                        {!! Form::label('number', 'Number:') !!}
                                                        {!! Form::text('number', null, ['class' => 'form-control']) !!}
                                                    </div>

                                                    <!-- submitButton submit field -->
                                                    <div class="form-group">
                                                        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                </li>
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
        <div class="panel panel-default accordion-panel">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="panel-toggle" data-toggle="collapse" href="#projectHits">
                        Project Hits ({{$project->hits->count()}})
                    </a>
                </h4>
            </div>
            <div id="projectHits" class="panel-body collapse">
                <div class="panel-inner">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Abeome #</th>
                            <th>Mouse</th>
                            <th>Plate</th>
                            <th>Well</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($project->hits as $hit)
                            <tr class="{{$hit->status < 0 ? "unsuccessful-hit" : ($hit->status == 3 ?  "final-hit" : "hit")}}">
                                <td>{{$hit->id}}</td>
                                <td>
                                    @if(empty($hit->abmno))
                                    {!! Form::open(['class' => 'give-abm-no']) !!}
                                        <div class="form-group">
                                                {!! Form::hidden('id', $hit->id, ['class' => 'form-control']) !!}
                                                {!! Form::text('abmno', null, ['class' => 'form-control']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                    @else
                                        {{$hit->abmno}}
                                    @endif
                                </td>
                                <td>{{$hit->mouse->name}}</td>
                                <td>{{$hit->plate->name}}</td>
                                <td>{{$hit->well}}</td>
                                <td>
                                    <span class="hit-status-text">{{$hit->getStatusText()}}</span>
                                    <button class="btn btn-danger pull-right stop-hit-button"
                                            data-hit-id="{{$hit->id}}">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                    <button class="btn btn-success pull-right next-status-button"
                                            data-hit-id="{{$hit->id}}">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">
        function passOrFail(el) {
            $(el).closest('tr').css('background-color', 'red');
        }
    </script>

    <script>
        $(document).ready(function () {

            $('.stop-hit-button').on('click', function (e) {
                var hitId = $(this).data('hit-id');
                e.preventDefault();

                $parent = $(this).parents('tr');
                $.post('/api/hits/' + hitId + '/cancel', {}, function (response) {
                    if (response.success) {
                        $parent.addClass('unsuccessful-hit');

                    }
                });
            });
            $('.next-status-button').on('click', function (e) {
                var hitId = $(this).data('hit-id');
                e.preventDefault();

                $parent = $(this).parents('tr');
                $.post('/api/hits/' + hitId + '/increment', {}, function (response) {
                    if (response.success) {
                        var status = response.status;
                        $parent.find('.hit-status-text').text(status);
                        if (response.hit.status == 3) {
                            $parent.addClass('final-hit');
                        }
                    }
                });
            });
            $('.give-abm-no').on('submit', function(e) {
                var formData = $(this).serializeArray();
                var hitId = $(formData).get(1).value;
                var abmname = $(formData).get(2).value;
                e.preventDefault();
                //console.log(abmname);

                $parent = $(this).parents('tr');
                $.post('/api/hits/' + hitId + '/name', {name: abmname}, function (response) {
                    if(response.success) {
                        var abmno = response.name;
                        $parent.find('.give-abm-no').text(abmno);
                    }
                })
            });

            //when a group is shown, save it as the active accordion group
            $(".accordion-panel").on('shown.bs.collapse', function () {
                var active = $(this).find(".in").attr('id');
                $.cookie('activeAccordionGroup', active);
                //  alert(active);
            });
            $("#mouseAccordion").on('shown.bs.collapse', function () {
                var active = $(this).find(".in").attr('id');
                $.cookie('activeMouse', active);
                //  alert(active);
            });

//            $(".accordion-panel").on('hidden.bs.collapse', function () {
//                $.cookie('activeMouse', null);
//                $.removeCookie('activeAccordionGroup');
//            });
            var last = $.cookie('activeAccordionGroup');
            if (last != null) {
                //remove default collapse settings
                $("#accordion .panel-collapse").removeClass('in');
                //show the account_last visible group
                $("#" + last).addClass("in");
            }

            var mouse = $.cookie('activeMouse');
            if (mouse) {
                $('.in #' + mouse).addClass("in");
            }
        });
    </script>
@stop

