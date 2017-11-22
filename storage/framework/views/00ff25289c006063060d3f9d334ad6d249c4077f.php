            

            <?php $__env->startSection('contentspeaker'); ?>
            <!-- form start -->
              <?php echo Form::open(['url' => '/backend/home/speakerPayment',
                              'method'=>'post',
                              'class'=>'form-horizontal',
                              'files'=>TRUE]); ?>

              <div class="box-body">
                
                <div class="form-group <?php echo $errors->has('email') ? 'has-error' : ''; ?>">
                <?php echo Form::label('participant', 'Participant Name', ['class' => 'col-sm-3 control-label']); ?>

                  <div class="col-sm-9">
                    <?php echo Form::text('participant', Auth::user()->name, ['class'=>'form-control','disabled'=>true]); ?>

                  </div>
                </div>
                <div class="form-group <?php echo $errors->has('file') ? 'has-error' : ''; ?>">
                <?php echo Form::label('file', 'Payment Proof', ['class' => 'col-sm-3 control-label']); ?>

                  <div class="col-sm-9">
                    <?php echo Form::file('file', null, ['class'=>'form-control']); ?>

                    <?php echo $errors->first('file', '<p class="help-block">:message</p>'); ?>

                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <?php echo Form::button('Lanjut <i class="fa fa-arrow-right"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')); ?>

              </div>
              <!-- /.box-footer -->
              <?php echo Form::close(); ?>

              <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.home.speaker.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>