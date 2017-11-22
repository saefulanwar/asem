    
    <?php $__env->startSection('contentparticipant'); ?>
    <div class="box-body">
    <div class="container">
    <div class="col-md-6">
            <div class="box-body">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Payment Proof</b> <a href="/img/payment/<?php echo e($payment_file); ?>" class="btn btn-md btn-link pull-right" target="_blank"><?php echo e($payment_file); ?></a>
                </li>
                <li class="list-group-item">
                  <b>State</b> <a class="btn btn-xs btn-info pull-right">Verify</a>
                </li>
              </ul>
            </div>
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-info"></i>

              <h3 class="box-title">Payment Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div class="alert alert-warning alert-dismissible">
                We still verified your payment...
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>

    </div>
    </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.home.participant.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>