<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('web/layouts/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

<?php echo $__env->make('web/layouts/menu/menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- END nav -->

<div class="hero-wrap" style="background-image: url('frontend/images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <h1 class="mb-4 bread">Tra cứu đặt phòng</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="w-100"></div>
            <div class="col-lg-12">
                <?php echo NoCaptcha::renderJs(); ?>

                <form action="<?php echo e(route('search_boking_result')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <h3 class="mb-4">Vui lòng nhập số điện thoại đang đặt phòng</h3>
                    <div class="form-group col-lg-12">
                        <?php if(session()->has('message')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session()->get('message')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-lg-12">
                        <input name="phone" type="text" class="form-control" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <?php echo NoCaptcha::display(); ?>

                        <?php if($errors->has('g-recaptcha-response')): ?>
                            <span class="help-block"><strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-lg-12">
                        <button class="btn btn-primary" type="submit">Tra cứu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php echo $__env->make('web/layouts/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>


<?php echo $__env->make('web/layouts/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>

<?php /**PATH D:\DEV\luanvan\resources\views/web/search-booking.blade.php ENDPATH**/ ?>