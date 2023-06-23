<script src="<?php echo e(asset('frontend/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery-migrate-3.0.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.easing.1.3.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.waypoints.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.stellar.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/aos.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.animateNumber.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.timepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/scrollax.min.js')); ?>"></script>=
<script src="<?php echo e(asset('frontend/js/google-map.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
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
<?php echo $__env->yieldContent('script'); ?><?php /**PATH D:\DEV\luanvan\resources\views/web/layouts/script.blade.php ENDPATH**/ ?>