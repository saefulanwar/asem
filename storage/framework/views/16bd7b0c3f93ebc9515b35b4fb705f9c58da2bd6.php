<?php $__env->startSection('title', 'MyBlog | Add new post'); ?>

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Post
          <small>Add new post</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="<?php echo e(route('blog.index')); ?>">Post</a></li>
          <li class="active">Add new</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <?php echo Form::model($post, [
                  'method' => 'POST',
                  'route'  => 'blog.store',
                  'files'  => TRUE,
                  'id' => 'post-form'
              ]); ?>


              <?php echo $__env->make('backend.blog.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo Form::close(); ?>

          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.blog.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('includes.backend.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>