<div class="form-group">
    {!! Form::hidden('mouse_id', $mouse->id, ['class' => 'form-control']) !!}
</div>
<!--Name text field -->

<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--Plate_type text field -->

<div class="form-group">
    {!! Form::label('plate_type', 'Plate Type:') !!}
    {!! Form::select('plate_type', [
    'Screen' => 'Screen',
    'Confirmation' => 'Confirmation',
    'Sequence' => 'Sequence',
    'Humanization' => 'Humanization',
    'Test' => 'Test'
    ], ['class' => 'form-control']) !!}
</div>

<!--Description text field -->

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- text field -->

<div class="form-group">
    {!! Form::hidden('isProcessed', '0', ['class' => 'form-control']) !!}
</div>

<!--  submit field -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>