<?php $__env->startSection('title', 'MyBlog | Edit Account'); ?>

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Account
          <small>Edit Account</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active">Edit Account</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <?php echo $__env->make('backend.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

              <?php echo Form::model($user, [
                  'method' => 'PUT',
                  'url'  => '/backend/edit-account',
                  'id' => 'post-form'
              ]); ?>


              <?php echo $__env->make('backend.users.form',['profileAccount' => true,'hideRoleDropdown' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo Form::close(); ?>

          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('includes.backend.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>