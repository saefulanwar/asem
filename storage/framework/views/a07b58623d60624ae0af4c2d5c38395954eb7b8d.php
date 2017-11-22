<?php $__env->startSection('contentspeaker'); ?>
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
                  <b>Speaker Name</b> <a class="btn btn-xs btn-link pull-right"><?php echo e(Auth::user()->name); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Title</b> <a class="btn btn-xs btn-link pull-right"><?php echo e($paperRevised->title); ?></a>
                </li>
                 <li class="list-group-item">
                  <b>Category</b> <a class="btn btn-xs btn-link pull-right"><?php echo e($paperRevised->category); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Presentation</b> <a class="btn btn-xs btn-link pull-right"><?php echo e($paperRevised->presentation); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Revision File</b> <a href="/img/paper/<?php echo e($paperRevised->paper_revision_file); ?>" class="btn btn-md btn-link pull-right" target="_blank"><?php echo e($paperRevised->paper_revision_file); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Sugestion</b> <a class="btn btn-xs btn-link pull-right"><?php echo e($paperRevised->sugestion); ?></a>
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
              <?php echo Form::open(['url' => '/backend/home/uploadRevisedPaper',
                              'method'=>'post',
                              'class'=>'form-horizontal',
                              'files'=>TRUE]); ?>

              <?php echo Form::hidden('paper_id', $paperRevised->paper_id); ?>

              <div class="box-body">
                <div class="form-group <?php echo $errors->has('file') ? 'has-error' : ''; ?>">
                <?php echo Form::label('file', 'Revised Paper File', ['class' => 'col-sm-4 control-label']); ?>

                  <div class="col-sm-8">
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

              </div>
              </div>

              </div>
              </div>
               </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.home.speaker.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>