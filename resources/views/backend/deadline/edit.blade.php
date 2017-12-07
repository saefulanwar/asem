@extends('includes.backend.main')

@section('title', 'Edit Deadline')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Deadline
          <small>Edit Deadline</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('deadline.index') }}">Deadline</a></li>
          <li class="active">Edit Deadline</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              {!! Form::model($deadlines, [
                  'method' => 'PUT',
                  'route'  => ['deadline.update', $deadlines->id],
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
