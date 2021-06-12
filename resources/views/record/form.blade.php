<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label('id_employed') }}
            {{ Form::text('id_employed', $record->id_employed, ['class' => 'form-control' . ($errors->has('id_employed') ? ' is-invalid' : ''), 'placeholder' => 'Id Employed']) }}
            {!! $errors->first('id_employed', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>