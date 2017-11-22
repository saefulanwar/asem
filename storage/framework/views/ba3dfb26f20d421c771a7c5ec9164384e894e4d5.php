<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
        </tr>
    </thead>
    <tbody>
        <?php $currentUser = auth()->user(); ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td>
                    <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                    <?php if($user->id == config('cms.default_user_id') || $user->id == $currentUser->id): ?>
                        <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                            <i class="fa fa-times"></i>
                        </button>
                    <?php else: ?>
                        <a href="<?php echo e(route('backend.users.confirm', $user->id)); ?>" class="btn btn-xs btn-danger">
                            <i class="fa fa-times"></i>
                        </a>
                    <?php endif; ?>
                </td>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->roles()->first()->name); ?></td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
