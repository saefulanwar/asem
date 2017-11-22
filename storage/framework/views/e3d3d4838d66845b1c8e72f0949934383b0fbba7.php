<?php if(session('message')): ?>
    <div class="alert alert-info">
        <?php echo e(session('message')); ?>

    </div>
<?php elseif(session('error-message')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error-message')); ?>

    </div>
<?php elseif(session('trash-message')): ?>
    <?php list($message, $postId) = session('trash-message') ?>
    <?php echo Form::open(['method' => 'PUT', 'route' => ['backend.blog.restore', $postId]]); ?>

        <div class="alert alert-info">
            <?php echo e($message); ?>

            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Undo</button>
        </div>
    <?php echo Form::close(); ?>

<?php endif; ?>
