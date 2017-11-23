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
                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['blog.destroy', $post->id]]); ?>

                        <?php if(check_user_permissions($request, "Blog@edit", $post->id)): ?>
                            <a href="<?php echo e(route('blog.edit', $post->id)); ?>" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i>
                            </a>
                        <?php else: ?>
                            <a href="#" class="btn btn-xs btn-default disabled">
                                <i class="fa fa-edit"></i>
                            </a>
                        <?php endif; ?>

                        <?php if(check_user_permissions($request, "Blog@destroy", $post->id)): ?>
                            <button type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        <?php else: ?>
                            <button type="button" onclick="return false;" class="btn btn-xs btn-danger disabled">
                                <i class="fa fa-trash"></i>
                            </button>
                        <?php endif; ?>
                    <?php echo Form::close(); ?>

                </td>
                <td><?php echo e($post->title); ?></td>
                <td><?php echo e($post->author->name); ?></td>
                <td><?php echo e($post->category->title); ?></td>
                <td>
                    <abbr title="<?php echo e($post->dateFormatted(true)); ?>"><?php echo e($post->dateFormatted()); ?></abbr> |
                    <?php echo $post->publicationLabel(); ?>

                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
