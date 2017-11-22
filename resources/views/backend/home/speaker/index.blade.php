@extends('includes.backend.main')

@section('title', 'MyBlog | Dashboar')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard Participant
        </h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Dashboard Participant</li>
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
                    
                  @yield('contentspeaker')

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

