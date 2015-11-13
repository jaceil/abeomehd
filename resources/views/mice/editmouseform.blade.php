<!--Project_id text field -->

<div class="form-group">
    {!! Form::hidden('project_id', $mouse->project->id, ['class' => 'form-control']) !!}
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

<!--Days text field -->

<div class="form-group">
        {!! Form::label('days', 'Days:') !!}
        {!! Form::text('days', null, ['class' => 'form-control']) !!}
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
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>