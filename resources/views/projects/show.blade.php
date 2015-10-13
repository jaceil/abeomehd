@extends('layout')

@section('content')
    <h2>{{ $project->name }}</h2>
    <hr>
    <div class="panel-group" id="accordion1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="panel-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">
                        Project Mice
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-body collapse">
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
                                        <tr><th>Plate ID</th><th>Date</th><th>Info</th><th>Processed?</th></tr>
                                       </thead>
                                       <tbody>
                                       @foreach($mouse->plates()->get()->all() as $plate)
                                           <tr><td><a href="{{action('PlatesController@show', [$plate->id])}}">{{$plate->name}}</a></td><td>{{$plate->created_at}}</td><td>{{$plate->description}}</td>
                                               <td>
                                                   @if($plate->isProcessed === '1')
                                                       <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                   @endif
                                               </td>
                                           </tr>
                                       @endforeach
                                       </tbody>
                                   </table>
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
                    <a class="panel-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                        Project Hits
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-body collapse">
                <div class="panel-inner">
                    This is a simple accordion inner content...
                </div>
            </div>
        </div>
    </div>

@endsection

