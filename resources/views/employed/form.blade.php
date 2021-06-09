<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('FrstName') }}
            {{ Form::text('FrstName', $employed->FrstName, ['class' => 'form-control' . ($errors->has('FrstName') ? ' is-invalid' : ''), 'placeholder' => 'Frstname']) }}
            {!! $errors->first('FrstName', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('MiddleName') }}
            {{ Form::text('MiddleName', $employed->MiddleName, ['class' => 'form-control' . ($errors->has('MiddleName') ? ' is-invalid' : ''), 'placeholder' => 'Middlename']) }}
            {!! $errors->first('MiddleName', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('LastName') }}
            {{ Form::text('LastName', $employed->LastName, ['class' => 'form-control' . ($errors->has('LastName') ? ' is-invalid' : ''), 'placeholder' => 'Lastname']) }}
            {!! $errors->first('LastName', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>