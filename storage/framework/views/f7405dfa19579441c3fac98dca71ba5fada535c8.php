<?php $__env->startSection('title', 'MyBlog | Blog index'); ?>

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Post
          <small>Display All Posts</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="<?php echo e(route('blog.index')); ?>">Post</a></li>
          <li class="active">All Posts</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header clearfix">
                    <div class="pull-left">
                        <a href="<?php echo e(route('blog.create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    <div class="pull-right" style="padding:7px 0;">
                        <?php $links = [] ?>
                        <?php $__currentLoopData = $statusList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value): ?>
                                <?php $selected = Request::get('status') == $key ? 'selected-status' : '' ?>
                                <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>" ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo implode(' | ', $links); ?>

                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <?php echo $__env->make('backend.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php if(! $posts->count()): ?>
                        <div class="alert alert-danger">
                            <strong>No record found</strong>
                        </div>
                    <?php else: ?>
                        <?php if($onlyTrashed): ?>
                            <?php echo $__env->make('backend.blog.table-trash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('backend.blog.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        <?php echo e($posts->appends( Request::query() )->render()); ?>

                    </div>
                    <div class="pull-right">
                        <small><?php echo e($postCount); ?> <?php echo e(str_plural('Item', $postCount)); ?></small>
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