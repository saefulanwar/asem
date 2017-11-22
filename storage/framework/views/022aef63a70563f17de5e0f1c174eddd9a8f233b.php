<?php echo Form::open(['url' => '/checkout/login','method'=>'post','class'=>'form-horizontal']); ?>

	
	<div class="form-group <?php echo $errors->has('email') ? 'has-error' : ''; ?>">
	<?php echo Form::label('email', 'Email', ['class' => 'col-md-4 control-label']); ?>

	<div class="col-md-6">
	<?php echo Form::email('email', null, ['class'=>'form-control']); ?>

	<?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

	</div>
	</div>

	<div class="form-group <?php echo $errors->has('is_guest') ? 'has-error' : ''; ?>">
	<div class="col-md-6 col-md-offset-4 radio">
	<p><label><?php echo e(Form::radio('is_guest', 1, true)); ?> Saya adalah pelanggan baru</label></p>
	<p><label><?php echo e(Form::radio('is_guest', 0)); ?> Saya adalah pelanggan tetap</label></p>
	<?php echo $errors->first('is_guest', '<p class="help-block">:message</p>'); ?>

	</div>
	</div>

	<div class="form-group <?php echo $errors->has('checkout_password') ? 'has-error' : ''; ?>">
	<?php echo Form::label('checkout_password', 'Password', ['class' => 'col-md-4 control-label']); ?>

	<div class="col-md-6">
	<?php echo Form::password('checkout_password', ['class'=>'form-control']); ?>

	<?php echo $errors->first('checkout_password', '<p class="help-block">:message</p>'); ?>


	<a href="<?php echo e(url('/password/reset')); ?>">Lupa kata sandi?</a>
	</div>
	</div>
	<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
	<?php echo Form::button('Lanjut <i class="fa fa-arrow-right"></i>', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>

	</div>
	</div>

<?php echo Form::close(); ?>