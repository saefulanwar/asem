<div class="col-xs-9">
  <div class="box">
    <div class="box-body ">

        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
            <?php echo Form::label('name'); ?>

            <?php echo Form::text('name', null, ['class' => 'form-control']); ?>


            <?php if($errors->has('name')): ?>
                <span class="help-block"><?php echo e($errors->first('name')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
            <?php echo Form::label('email'); ?>

            <?php echo Form::text('email', null, ['class' => 'form-control']); ?>


            <?php if($errors->has('email')): ?>
                <span class="help-block"><?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            <?php echo Form::label('password'); ?>

            <?php echo Form::password('password', ['class' => 'form-control']); ?>


            <?php if($errors->has('password')): ?>
                <span class="help-block"><?php echo e($errors->first('password')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
            <?php echo Form::label('password_confirmation'); ?>

            <?php echo Form::password('password_confirmation', ['class' => 'form-control']); ?>


            <?php if($errors->has('password_confirmation')): ?>
                <span class="help-block"><?php echo e($errors->first('password_confirmation')); ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group <?php echo e($errors->has('role') ? 'has-error' : ''); ?>">
            <?php echo Form::label('role'); ?>

            <?php if($user->exists && $user->id == config('cms.default_user_id')): ?>
                <?php echo Form::hidden('role', $user->roles->first()->id); ?>

                <p class="form-control-static"><?php echo e($user->roles->first()->display_name); ?></p> 
            <?php else: ?>
            <?php echo Form::select('role',App\Role::pluck('display_name','id'), $user->exists ? $user->roles->first()->id : null, ['class' => 'form-control','placeholder'=>'Choose a role']); ?>

            <?php endif; ?>  

            <?php if($errors->has('role')): ?>
                <span class="help-block"><?php echo e($errors->first('role')); ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group <?php echo e($errors->has('bio') ? 'has-error' : ''); ?>">
            <?php echo Form::label('bio'); ?>

            <?php echo Form::textarea('bio', null, ['rows' => 5,'class' => 'form-control']); ?>


            <?php if($errors->has('bio')): ?>
                <span class="help-block"><?php echo e($errors->first('bio')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary"><?php echo e($user->exists ? 'Update' : 'Save'); ?></button>
        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-default">Cancel</a>
    </div>
  </div>
  <!-- /.box -->
</div>
