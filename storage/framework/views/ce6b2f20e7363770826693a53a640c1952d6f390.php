<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td>Category Name</td>
            <td width="120">Post Count</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td>
                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id]]); ?>

                        <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i>
                        </a>
                        <?php if($category->id == config('cms.default_category_id')): ?>
                            <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                                <i class="fa fa-times"></i>
                            </button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-xs btn-danger js-submit-confirm">
                                <i class="fa fa-times"></i>
                            </button>
                        <?php endif; ?>
                    <?php echo Form::close(); ?>

                </td>
                <td><?php echo e($category->title); ?></td>
                <td><?php echo e($category->posts->count()); ?></td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
