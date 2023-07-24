<!DOCTYPE html>
<html lang="en">
    <?php echo $__env->make('admin/layouts/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
          integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <body>
        <?php echo $__env->make('admin/layouts/topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="page-wrapper">
            <?php echo $__env->make('admin/layouts/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="container-fluid">
                <?php echo $__env->make('admin/layouts/notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </body>
    <?php echo $__env->make('admin/layouts/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        <?php if(Session::has('message')): ?>
        let type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
        switch (type) {
            case 'info':
                toastr.info("<?php echo e(Session::get('message')); ?>")
                break;
            case 'success':
                toastr.success("<?php echo e(Session::get('message')); ?>")
                break;
            case 'warning':
                toastr.warning("<?php echo e(Session::get('message')); ?>")
                break;
            case 'error':
                toastr.error("<?php echo e(Session::get('message')); ?>")
                break;
            default:
                break;
        }
        <?php endif; ?>

    </script>
</html><?php /**PATH D:\DEV\lv\resources\views/admin/master.blade.php ENDPATH**/ ?>