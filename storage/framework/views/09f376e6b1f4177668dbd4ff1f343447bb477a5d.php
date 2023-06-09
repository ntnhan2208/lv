<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('web/layouts/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<?php echo $__env->make('web/layouts/menu/menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="hero-wrap" style="background-image:url('<?php echo e(asset('frontend/images/bg_1.jpg')); ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center text">
                <h1 class="mb-4 bread">Kết quả tìm kiếm</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm col-md-6 col-lg-4 ftco-animate ">
                            <div class="room">
                                <a href="<?php echo e(route('web_rooms.show',$room->id)); ?>"
                                   class="img d-flex justify-content-center align-items-center"
                                   style="background-image: url(<?php echo e($room->image); ?>);">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3 text-center">
                                    <h3 class="mb-3"><a href="rooms-single.html"><?php echo e($room->name); ?></a></h3>
                                    <p><span class="price mr-2"><?php echo e(number_format($room->price)); ?>đ</span></p>
                                    <ul class="list">
                                        <li><span>Số người:</span> <?php echo e($room->amount); ?></li>
                                        <li><span>Loại phòng:</span> <?php echo e($room->type->name); ?></li>
                                    </ul>
                                    <hr>
                                    <p class="pt-1"><a href="<?php echo e(route('create_request',$room->id)); ?>"
                                                       class="btn-custom">Đặt phòng <span
                                                    class="icon-long-arrow-right"></span></a></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

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
<?php /**PATH D:\DEV\luanvan\resources\views/web/search-result.blade.php ENDPATH**/ ?>