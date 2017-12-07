@extends('includes.backend.main')

@section('title', 'Add new Deadline')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Deadline 
          <small>Add new Deadline</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('deadline.index') }}">Deadline</a></li>
          <li class="active">Add new</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              {!! Form::model($deadlines, [
                  'method' => 'POST',
                  'route'  => 'deadline.store',
                  'files'  => TRUE,
                  'id' => 'deadline-form'
              ]) !!}

              @include('backend.deadline.form')

            {!! Form::close() !!}
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

@endsection

@include('backend.deadline.script')
