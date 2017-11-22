<?php $__env->startSection('title', 'MyBlog | Edit user'); ?>

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Users
          <small>Edit user</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="<?php echo e(route('users.index')); ?>">Users</a></li>
          <li class="active">Edit user</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <?php echo Form::model($user, [
                  'method' => 'PUT',
                  'route'  => ['users.update', $user->id],
                  'files'  => TRUE,
                  'id'     => 'user-form'
              ]); ?>


              <?php echo $__env->make('backend.users.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo Form::close(); ?>

          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('includes.backend.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>