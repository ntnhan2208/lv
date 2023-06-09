<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('web/layouts/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

<?php echo $__env->make('web/layouts/menu/menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- END nav -->

<div class="hero-wrap" style="background-image:url('<?php echo e(asset('frontend/images/bg_1.jpg')); ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <h1 class="mb-4 bread">Chi tiết phòng</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <h2 class="mb-4"><?php echo e($room->name); ?></h2>
                        <div class="single-slider owl-carousel">
                            <div class="item">
                                <div class="room-img" style="background-image: url(<?php echo e($room->image); ?>);"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                        <div class="row">
                            <div class="sidebar-box ftco-animate">
                                <div class="categories">
                                    <li><p><?php echo e($room->description); ?></p></li>
                                    <li>Loại phòng: </span><?php echo e($room->type->name); ?></li>
                                    <li>Số người: </span><?php echo e($room->amount); ?></li>
                                    <li>Giá: </span><?php echo e($room->price); ?></li>

                                </div>
                            </div>
                        </div>
                        <span><a href="<?php echo e(route('create_request',$room->id)); ?>" type="submit"
                                 class="btn btn-primary py-2 px-2">Gửi yêu cầu đặt phòng</a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Loại phòng</h3>
                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('show_room_type',$type->id)); ?>"><?php echo e($type->name); ?><span>(<?php echo e($type->rooms()->where('is_enabled', 1)->where('booked', 0)->count()); ?>)</span></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb-4">Phòng tương tự</h4>
                <div class="row">
                    <?php $__currentLoopData = $availables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $available): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm col-md-4 ftco-animate">
                            <div class="room">
                                <a href=""
                                   class="img img-2 d-flex justify-content-center align-items-center"
                                   style="background-image: url(<?php echo e($available->image); ?>);">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3 text-center">
                                    <h3 class="mb-3"><a href="rooms.html"><?php echo e($available->name); ?></a></h3>
                                    <p><span class="price mr-2"><?php echo e($available->price); ?></span></p>
                                    <hr>
                                    <p class="pt-1"><a href=""
                                                       class="btn-custom">Chi tiết phòng <span
                                                    class="icon-long-arrow-right"></span></a></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>
</section> <!-- .section -->


<section class="instagram pt-5">
    <div class="container-fluid">
        <div class="row no-gutters justify-content-center pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2><span>Instagram</span></h2>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-sm-12 col-md ftco-animate">
                <a href="public/frontend/images/insta-1.jpg" class="insta-img image-popup"
                   style="background-image:url('<?php echo e(asset('frontend/images/insta-1.jpg')); ?>');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-2.jpg" class="insta-img image-popup"
                   style="background-image:url('<?php echo e(asset('frontend/images/insta-2.jpg')); ?>');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-3.jpg" class="insta-img image-popup"
                   style="background-image:url('<?php echo e(asset('frontend/images/insta-3.jpg')); ?>');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-4.jpg" class="insta-img image-popup"
                   style="background-image:url('<?php echo e(asset('frontend/images/insta-4.jpg')); ?>');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-5.jpg" class="insta-img image-popup"
                   style="background-image:url('<?php echo e(asset('frontend/images/insta-5.jpg')); ?>');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
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
<?php /**PATH C:\laragon\www\LVTN-FINAL\nhanhao\resources\views/web/room-detail.blade.php ENDPATH**/ ?>