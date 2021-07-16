<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label('id_employed') }}
            {{ Form::number('id_employed', $record->id_employed, ['min' =>1,'required' => 'required','class' => 'form-control' . ($errors->has('id_employed') ? ' is-invalid' : ''), 'placeholder' => 'Id Employed']) }}
            {!! $errors->first('id_employed', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="{{'/employeds'}}">Cancel</a>
    </div>
</div>