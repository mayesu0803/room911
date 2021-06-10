<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_employed') }}
            {{ Form::text('id_employed', $employed->id_employed, ['class' => 'form-control' . ($errors->has('id_employed') ? ' is-invalid' : ''), 'placeholder' => 'Id Employed']) }}
            {!! $errors->first('id_employed', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('first_name') }}
            {{ Form::text('first_name', $employed->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'First Name']) }}
            {!! $errors->first('first_name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('middle_name') }}
            {{ Form::text('middle_name', $employed->middle_name, ['class' => 'form-control' . ($errors->has('middle_name') ? ' is-invalid' : ''), 'placeholder' => 'Middle Name']) }}
            {!! $errors->first('middle_name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('last_name') }}
            {{ Form::text('last_name', $employed->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name']) }}
            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('room_access') }}
            {{ Form::checkbox('room_access', $employed->room_access, ['class' => 'form-control' . ($errors->has('room_access') ? ' is-invalid' : ''), 'placeholder' => 'Room Access']) }}
            {!! $errors->first('room_access', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_department') }}
            {{ Form::text('id_department', $employed->id_department, ['class' => 'form-control' . ($errors->has('id_department') ? ' is-invalid' : ''), 'placeholder' => 'Id Department']) }}
            {!! $errors->first('id_department', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>