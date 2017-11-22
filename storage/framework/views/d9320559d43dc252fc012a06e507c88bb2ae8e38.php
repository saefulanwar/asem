<?php $__env->startSection('title', 'MyBlog | Dashboar'); ?>

<?php $__env->startSection('content'); ?>

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
              <?php echo $__env->make('backend.home.participant._step', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <div class="row">
                <div class="col-xs-7">
                  <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Upload Payment Proof</h3>
                  </div>

                    
                  
                  <?php echo $__env->yieldContent('contentparticipant'); ?>

                  </div>  
                  </div>  
              <div class="col-xs-4">  
               <div class="box box-success">
                <?php echo $__env->make('backend.home.participant._side-step-panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('includes.backend.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>