<div class="col-xs-9">
  <div class="box">
    <div class="box-body ">

        <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
            <?php echo Form::label('title'); ?>

            <?php echo Form::text('title', null, ['class' => 'form-control']); ?>


            <?php if($errors->has('title')): ?>
                <span class="help-block"><?php echo e($errors->first('title')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
            <?php echo Form::label('slug'); ?>

            <?php echo Form::text('slug', null, ['class' => 'form-control']); ?>


            <?php if($errors->has('slug')): ?>
                <span class="help-block"><?php echo e($errors->first('slug')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary"><?php echo e($category->exists ? 'Update' : 'Save'); ?></button>
        <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-default">Cancel</a>
    </div>
  </div>
  <!-- /.box -->
</div>
