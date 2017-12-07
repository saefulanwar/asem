<div class="col-xs-12">
    <div class="box">
        <div class="box-body ">

            <div class="form-group {{ $errors->has('paper_revision_file') ? 'has-error' : '' }}">
                {!! Form::label('paper_revision_file') !!}
                {!! Form::file('file', null, ['class'=>'form-control']) !!}
                {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('sugestion') ? 'has-error' : '' }}">
                {!! Form::label('sugestion') !!}
                {!! Form::textarea('sugestion', null, ['class' => 'form-control']) !!}

                @if($errors->has('sugestion'))
                <span class="help-block">{{ $errors->first('sugestion') }}</span>
                @endif
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
                <a href="{{ route("paperreview.index") }}" class="btn btn-default">Cancel</a>
                {!! Form::submit('Process', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    <!-- /.box -->
</div>

