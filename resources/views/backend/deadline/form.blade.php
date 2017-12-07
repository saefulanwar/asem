<div class="col-xs-9">
  <div class="box">
    <div class="box-body ">

        <div class="form-group {{ $errors->has('date_of_conference') ? 'has-error' : '' }}">
            {!! Form::label('date_of_conference') !!}
            {!! Form::text('date_of_conference', null, ['class' => 'form-control']) !!}

            @if($errors->has('date_of_conference'))
                <span class="help-block">{{ $errors->first('date_of_conference') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('audience_registration') ? 'has-error' : '' }}">
            {!! Form::label('audience_registration') !!}
            {!! Form::text('audience_registration', null, ['class' => 'form-control']) !!}

            @if($errors->has('audience_registration'))
                <span class="help-block">{{ $errors->first('audience_registration') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('presenter_registration') ? 'has-error' : '' }}">
            {!! Form::label('presenter_registration') !!}
            {!! Form::text('presenter_registration', null, ['class' => 'form-control']) !!}

            @if($errors->has('presenter_registration'))
                <span class="help-block">{{ $errors->first('presenter_registration') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('ticket_payment') ? 'has-error' : '' }}">
            {!! Form::label('ticket_payment') !!}
            {!! Form::text('ticket_payment', null, ['class' => 'form-control']) !!}

            @if($errors->has('ticket_payment'))
                <span class="help-block">{{ $errors->first('ticket_payment') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('abstract_submission') ? 'has-error' : '' }}">
            {!! Form::label('abstract_submission') !!}
            {!! Form::text('abstract_submission', null, ['class' => 'form-control']) !!}

            @if($errors->has('abstract_submission'))
                <span class="help-block">{{ $errors->first('abstract_submission') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('fullpaper_submission') ? 'has-error' : '' }}">
            {!! Form::label('fullpaper_submission') !!}
            {!! Form::text('fullpaper_submission', null, ['class' => 'form-control']) !!}

            @if($errors->has('fullpaper_submission'))
                <span class="help-block">{{ $errors->first('fullpaper_submission') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('abstract_payment') ? 'has-error' : '' }}">
            {!! Form::label('abstract_payment') !!}
            {!! Form::text('abstract_payment', null, ['class' => 'form-control']) !!}

            @if($errors->has('abstract_payment'))
                <span class="help-block">{{ $errors->first('abstract_payment') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('revised_paper') ? 'has-error' : '' }}">
            {!! Form::label('revised_paper') !!}
            {!! Form::text('revised_paper', null, ['class' => 'form-control']) !!}

            @if($errors->has('revised_paper'))
                <span class="help-block">{{ $errors->first('revised_paper') }}</span>
            @endif
        </div>
       
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">{{ $deadlines->exists ? 'Update' : 'Save' }}</button>
        <a href="{{ route('deadline.index') }}" class="btn btn-default">Cancel</a>
    </div>
  </div>
  <!-- /.box -->
</div>
