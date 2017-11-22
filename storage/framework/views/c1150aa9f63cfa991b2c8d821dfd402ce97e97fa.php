<div class="form-group <?php echo $errors->has('name') ? 'has-error' : ''; ?>">
<?php echo Form::label('name', 'Nama', ['class' => 'col-md-4 control-label']); ?>

<div class="col-md-6">
<?php echo Form::text('name', null, ['class'=>'form-control']); ?>

<?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

</div>
</div>
<div class="form-group <?php echo $errors->has('detail') ? 'has-error' : ''; ?>">
<?php echo Form::label('detail', 'Alamat', ['class' => 'col-md-4 control-label']); ?>

<div class="col-md-6">
<?php echo Form::textarea('detail', null, ['class'=>'form-control', 'rows' => 3]); ?>

<?php echo $errors->first('detail', '<p class="help-block">:message</p>'); ?>

</div>
</div>
<div class="form-group <?php echo $errors->has('province_id') ? 'has-error' : ''; ?>">
<?php echo Form::label('province_id', 'Provinsi', ['class' => 'col-md-4 control-label']); ?>

<div class="col-md-6">
<?php echo Form::select('province_id', [''=>'','1'=>'Yogyakarta','2'=>'Banjarmasin'], null, ['class'=>'form-control']); ?>

<?php echo $errors->first('province_id', '<p class="help-block">:message</p>'); ?>

</div>
</div>
<div class="form-group <?php echo $errors->has('regency_id') ? 'has-error' : ''; ?>">
<?php echo Form::label('regency_id', 'Kabupaten / Kota', ['class' => 'col-md-4 control-label']); ?>

<div class="col-md-6">
<?php echo Form::select('regency_id', [], old('regency_id'), ['class'=>'form-control']); ?>

<?php echo $errors->first('regency_id', '<p class="help-block">:message</p>'); ?>

</div>
</div>
<div class="form-group <?php echo $errors->has('phone') ? 'has-error' : ''; ?>">
<?php echo Form::label('phone', 'Telepon', ['class' => 'col-md-4 control-label']); ?>

<div class="col-md-6">
<div class="input-group">
<div class="input-group-addon">+62</div>
<?php echo Form::text('phone', null, ['class'=>'form-control']); ?>

</div>
<?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

</div>
</div>