<?php if(count($errors)>0): ?>
    <ul class="alert alert-danger mt-3">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="ml-3"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?><?php /**PATH D:\DEV\lv\resources\views/admin/layouts/notification.blade.php ENDPATH**/ ?>