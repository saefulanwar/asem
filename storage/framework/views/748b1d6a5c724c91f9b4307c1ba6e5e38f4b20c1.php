<?php $__env->startSection('content'); ?>
<div class="container">
	<?php echo $__env->make('checkout._step', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
			<div class="panel-heading">Login atau Checkout tanpa mendaftar</div>
			<div class="panel-body">
			
				<?php if(session('status')): ?>
				<div class="alert alert-success">
				<?php echo e(session('status')); ?>

				</div>
				<?php endif; ?>

				<?php echo $__env->make('checkout._login-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>	
			</div>
		</div>		
	<div class="col-xs-4">	
		
	</div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>