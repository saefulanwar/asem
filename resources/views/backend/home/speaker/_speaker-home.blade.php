@extends('includes.backend.main')

@section('title', 'MyBlog | Dashboar')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
        </h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body ">

            <div class="container">
              @include('backend.home.speaker._step')
              <div class="row">
                <div class="col-xs-7">
                  <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Upload Abstract</h3>
                  </div>
                  
                    @if (session('status'))
                    <div class="alert alert-success">
                    {{ session('status') }}
                    </div>
                    @endif

                    @include('backend.home.speaker._upload-abstract-form')

                  </div>  
                  </div>  
              <div class="col-xs-4">  
               <div class="box box-success">
                @include('backend.home.speaker._side-step-panel') 
               </div> 
              </div>
              </div>
            </div>
                     
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

@endsection
@section('script')
<script>

</script>
@endsection

