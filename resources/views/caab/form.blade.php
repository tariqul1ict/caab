<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('sl') }}
            {{ Form::text('sl', $caab->sl, ['class' => 'form-control' . ($errors->has('sl') ? ' is-invalid' : ''), 'placeholder' => 'Sl']) }}
            {!! $errors->first('sl', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lat') }}
            {{ Form::text('lat', $caab->lat, ['class' => 'form-control' . ($errors->has('lat') ? ' is-invalid' : ''), 'placeholder' => 'Lat']) }}
            {!! $errors->first('lat', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('long') }}
            {{ Form::text('long', $caab->long, ['class' => 'form-control' . ($errors->has('long') ? ' is-invalid' : ''), 'placeholder' => 'Long']) }}
            {!! $errors->first('long', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('height') }}
            {{ Form::text('height', $caab->height, ['class' => 'form-control' . ($errors->has('height') ? ' is-invalid' : ''), 'placeholder' => 'Height']) }}
            {!! $errors->first('height', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('airport') }}
            {{ Form::text('airport', $caab->airport, ['class' => 'form-control' . ($errors->has('airport') ? ' is-invalid' : ''), 'placeholder' => 'Airport']) }}
            {!! $errors->first('airport', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>