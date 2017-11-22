<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td>Title</td>
            <td width="120">Author</td>
            <td width="150">Category</td>
            <td width="170">Date</td>
        </tr>
    </thead>
    <tbody>
        <?php $request = request(); ?>

        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td>
                    <?php echo Form::open(['style' => 'display:inline-block;', 'method' => 'PUT', 'route' => ['backend.blog.restore', $post->id]]); ?>

                        <?php if(check_user_permissions($request, "Blog@restore", $post->id)): ?>
                            <button title="Restore" class="btn btn-xs btn-default">
                                <i class="fa fa-refresh"></i>
                            </button>
                        <?php else: ?>
                            <button title="Restore" onclick="return false;" class="btn btn-xs btn-default disabled">
                                <i class="fa fa-refresh"></i>
                            </button>
                        <?php endif; ?>
                    <?php echo Form::close(); ?>


                    <?php echo Form::open(['style' => 'display:inline-block;', 'method' => 'DELETE', 'route' => ['backend.blog.force-destroy', $post->id]]); ?>

                        <?php if(check_user_permissions($request, "Blog@forceDestroy", $post->id)): ?>
                            <button title="Delete Permanent" type="submit" class="btn btn-xs btn-danger js-submit-confirm">
                                <i class="fa fa-times"></i>
                            </button>
                        <?php else: ?>
                            <button title="Delete Permanent" onclick="return false;" type="submit" class="btn btn-xs btn-danger disabled">
                                <i class="fa fa-times"></i>
                            </button>
                        <?php endif; ?>
                    <?php echo Form::close(); ?>

                </td>
                <td><?php echo e($post->title); ?></td>
                <td><?php echo e($post->author->name); ?></td>
                <td><?php echo e($post->category->title); ?></td>
                <td>
                    <abbr title="<?php echo e($post->dateFormatted(true)); ?>"><?php echo e($post->dateFormatted()); ?></abbr>
                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
