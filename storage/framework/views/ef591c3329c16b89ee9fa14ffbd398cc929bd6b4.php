<?php echo Form::open(['url' => '/checkout/address', 'method'=>'post', 'class' => 'form-horizontal']); ?>

<?php echo $__env->make('checkout._address-field', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<?php echo Form::button('Lanjut <i class="fa fa-arrow-right"></i>', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>

</div>
</div>
<?php echo Form::close(); ?>