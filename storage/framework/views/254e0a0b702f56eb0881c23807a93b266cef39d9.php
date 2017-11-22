<?php $__env->startSection('content'); ?>
<div class="container">
<?php echo $__env->make('checkout._step', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row">
<div class="col-xs-10">
<div class="panel panel-default">
<div class="panel-heading">Alamat Pengiriman</div>
<div class="panel-body">
<?php echo $__env->make('checkout._address-new-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
</div>
</div>
<div class="col-xs-4">
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>