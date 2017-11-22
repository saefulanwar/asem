<?php $__env->startSection('title', 'MyBlog | Delete Confirmation'); ?>

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Users
          <small>Delete Confirmation</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="<?php echo e(route('users.index')); ?>">Users</a></li>
          <li class="active">Delete Confirmation</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <?php echo Form::model($user, [
                  'method' => 'DELETE',
                  'route'  => ['users.destroy', $user->id],
              ]); ?>


              <div class="col-xs-9">
                  <div class="box">
                      <div class="box-body ">
                          <p>
                              You have specified this user for deletion:
                          </p>
                          <p>
                              ID #<?php echo e($user->id); ?>: <?php echo e($user->name); ?>

                          </p>
                          <p>
                              What should be done with content own by this user?
                          </p>
                          <p>
                              <input type="radio" name="delete_option" value="delete" checked> Delete All Content
                          </p>

                          <p>
                              <input type="radio" name="delete_option" value="attribute"> Attribute content to:
                              <?php echo Form::select('selected_user', $users, null); ?>

                          </p>

                      </div>
                      <div class="box-footer">
                          <button type="submit" class="btn btn-danger js-submit-confirm">Confirm Deletion</button>
                          <a href="<?php echo e(route('users.index')); ?>" class="btn btn-default">Cancel</a>
                      </div>
                  </div>
              </div>

            <?php echo Form::close(); ?>

          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('includes.backend.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>