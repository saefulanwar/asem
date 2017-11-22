<?php $__env->startSection('title', 'MyBlog | Users'); ?>

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Users
          <small>Display All users</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="<?php echo e(route('users.index')); ?>">Users</a></li>
          <li class="active">All users</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header clearfix">
                    <div class="pull-left">
                        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    <div class="pull-right">
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <?php echo $__env->make('backend.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php if(! $users->count()): ?>
                        <div class="alert alert-danger">
                            <strong>No record found</strong>
                        </div>
                    <?php else: ?>
                        <?php echo $__env->make('backend.users.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        <?php echo e($users->appends( Request::query() )->render()); ?>

                    </div>
                    <div class="pull-right">
                        <small><?php echo e($usersCount); ?> <?php echo e(str_plural('Item', $usersCount)); ?></small>
                    </div>
                </div>
              </div>
              <!-- /.box -->
            </div>
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('includes.backend.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>