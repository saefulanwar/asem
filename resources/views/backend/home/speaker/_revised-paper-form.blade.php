{{-- {{dd($paperRevised)}} --}}
@extends('backend.home.speaker.index')
@section('contentspeaker')
<div class="box-body">
    <div class="container">

		<div class="col-md-6">
	    <div class="box box-default">
	            <div class="box-header with-border">
	              <i class="fa fa-info"></i>

	              <h3 class="box-title">Papers Review Detail</h3>
            	</div>
            <div class="box-body">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Speaker Name</b> <a class="btn btn-xs btn-link pull-right">{{Auth::user()->name}}</a>
                </li>
                <li class="list-group-item">
                  <b>Title</b> <a class="btn btn-xs btn-link pull-right">{{$paperRevised->title}}</a>
                </li>
                 <li class="list-group-item">
                  <b>Category</b> <a class="btn btn-xs btn-link pull-right">{{$paperRevised->category}}</a>
                </li>
                <li class="list-group-item">
                  <b>Presentation</b> <a class="btn btn-xs btn-link pull-right">{{$paperRevised->presentation}}</a>
                </li>
                <li class="list-group-item">
                  <b>Revision File</b> <a href="/img/paper/{{$paperRevised->paper_revision_file}}" class="btn btn-md btn-link pull-right" target="_blank">{{$paperRevised->paper_revision_file}}</a>
                </li>
                <li class="list-group-item">
                  <b>Sugestion</b> <a class="btn btn-xs btn-link pull-right">{{$paperRevised->sugestion}}</a>
                </li>
                <li class="list-group-item">
                  <b>State</b> <a class="btn btn-xs btn-success pull-right">Approved</a>
                </li>
              </ul>
            </div>
        </div>    

<hr>
 			 <div class="col-md-14">
	    		<div class="box box-default">
 			 <!-- form start -->
 			 <div class="box-header with-border">
                    <h3 class="box-title">Upload Revised Paper</h3>
                  </div>
              {!! Form::open(['url' => '/backend/home/uploadRevisedPaper',
                              'method'=>'post',
                              'class'=>'form-horizontal',
                              'files'=>TRUE]) !!}
              {!! Form::hidden('paper_id', $paperRevised->paper_id) !!}
              <div class="box-body">
                <div class="form-group {!! $errors->has('file') ? 'has-error' : '' !!}">
                {!! Form::label('file', 'Revised Paper File', ['class' => 'col-sm-4 control-label']) !!}
                  <div class="col-sm-8">
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
              </div>
              </div>

              </div>
              </div>
               </div>

@endsection