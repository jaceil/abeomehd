@extends('layout')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr><th>Mouse</th><th>Antigen</th><th>Gender</th><th>Adjuvant</th><th>Injection Date</th><th>Harvest Date</th><th>Final Titer</th></tr>
        </thead>
        <tbody>
        @foreach($project->mice()->latest()->get() as $mouse)
            <tr><td>{{$mouse->name}}</td><td>{{$mouse->antigen}}</td><td>{{$mouse->gender}}</td><td>{{$mouse->adjuvant}}</td><td>{{$mouse->injectionDate}}</td><td>{{$mouse->harvestDate}}</td><td>{{$mouse->titer}}</td></tr>
        @endforeach
        </tbody>
    </table>
    <hr>


    <div class="col-md-6">
    {!! Form::open(['url' => 'mice']) !!}

        <!--Project_id text field -->

        <div class="form-group">
                {!! Form::hidden('project_id', $project->id, ['class' => 'form-control']) !!}
        </div>
        <!-- name text field -->

        <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!--Antigen text field -->

        <div class="form-group">
                {!! Form::label('antigen', 'Antigen:') !!}
                {!! Form::text('antigen', null, ['class' => 'form-control']) !!}
        </div>

        <!--Gender text field -->

        <div class="form-group">
                {!! Form::label('gender', 'Gender:') !!}
                {!! Form::radio('gender', 'M', false) !!} Male
                {!! Form::radio('gender', 'F', false) !!} Female
        </div>

        <!--Adjuvant text field -->

        <div class="form-group">
                {!! Form::label('adjuvant', 'Adjuvant:') !!}
                {!! Form::text('adjuvant', null, ['class' => 'form-control']) !!}
        </div>

        <!--InjectionDate text field -->

        <div class="form-group">
                {!! Form::label('injectionDate', 'Injection Date:') !!}
                {!! Form::input('date', 'injectionDate', date('Y-m-d'), ['class' => 'form-control']) !!}
        </div>

        <!--HarvestDate text field -->

        <div class="form-group">
                {!! Form::label('harvestDate', 'Harvest Date:') !!}
                {!! Form::input('date', 'harvestDate', date('Y-m-d'), ['class' => 'form-control']) !!}
        </div>

        <!--Titer text field -->

        <div class="form-group">
                {!! Form::label('titer', 'Titer:') !!}
                {!! Form::text('titer', null, ['class' => 'form-control']) !!}
        </div>

        <!-- submit submit field -->
        <div class="form-group">
            {!! Form::submit('Add Mouse', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
    </div>
@stop