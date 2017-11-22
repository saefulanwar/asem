    @extends('backend.home.participant.index')
    @section('contentparticipant')
            <!-- form start -->
              {!! Form::open(['url' => '/backend/home/paymentProof',
                              'method'=>'post',
                              'class'=>'form-horizontal',
                              'files'=>TRUE]) !!}
              <div class="box-body">
                
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                {!! Form::label('participant', 'Participant Name', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-sm-9">
                    {!! Form::text('participant', Auth::user()->name, ['class'=>'form-control','disabled'=>true]) !!}
                  </div>
                </div>
                <div class="form-group {!! $errors->has('file') ? 'has-error' : '' !!}">
                {!! Form::label('file', 'Payment Proof', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-sm-9">
                    {!! Form::file('file', null, ['class'=>'form-control']) !!}
                    {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                {!! Form::button('Lanjut <i class="fa fa-arrow-right"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
              </div>
              <!-- /.box-footer -->
              {!! Form::close() !!}
              @endsection