@extends('backend.home.speaker.index')
@section('contentspeaker')
                  <div class="box-header with-border">
                    <h3 class="box-title">Upload Abstract</h3>
                  </div>
 <!-- form start -->
              {!! Form::open(['url' => '/backend/home/uploadAbstract',
                              'method'=>'post',
                              'class'=>'form-horizontal',
                              'files'=>TRUE]) !!}
              <div class="box-body">
                
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                {!! Form::label('participant', 'Speaker Name', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-sm-9">
                    {!! Form::text('participant', Auth::user()->name, ['class'=>'form-control','disabled'=>true]) !!}
                  </div>
                </div>
                <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
                {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-sm-9">
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                  </div>
                </div>
                 <div class="form-group {!! $errors->has('category') ? 'has-error' : '' !!}">
                {!! Form::label('category', 'Category', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-sm-9">
                    {!! Form::select('category',App\Models\PaperStatus::pluck('name','id') , null, ['class'=>'form-control','placeholder'=>'Choose Category']) !!}
                  </div>
                </div>
                <div class="form-group {!! $errors->has('presentation') ? 'has-error' : '' !!}">
                {!! Form::label('presentation', 'Presentation', ['class' => 'col-sm-3 control-label']) !!}
                  <div class="col-sm-9">
                    {!! Form::select('presentation',App\Models\Presentation::pluck('name','id') , null, ['class'=>'form-control','placeholder'=>'Choose Presentation']) !!}
                  </div>
                </div>
                <div class="form-group {!! $errors->has('file') ? 'has-error' : '' !!}">
                {!! Form::label('file', 'Abstract File', ['class' => 'col-sm-3 control-label']) !!}
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