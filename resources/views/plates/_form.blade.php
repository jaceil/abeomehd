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