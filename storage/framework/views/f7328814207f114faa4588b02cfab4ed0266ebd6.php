<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('web/layouts/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<?php echo $__env->make('web/layouts/menu/menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="hero-wrap" style="background-image: url('frontend/images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center text">
                <h1 class="mb-4 bread">Danh sách phòng</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section bg-light">
    <?php if(\Session::has('success')): ?>
        <div class="alert alert-success">
            <h5 style=""><?php echo \Session::get('success'); ?></h5>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
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
            <div class="col-lg-3 sidebar">
                <div class="sidebar-wrap bg-light ftco-animate">
                    <h3 class="heading mb-4">Tìm kiếm</h3>
                    <form action="<?php echo e(route('search_room')); ?>" method="POST"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="fields">
                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="type" id="lst-type" class="form-control">
                                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="amount" id="lst-amount" class="form-control">
                                        <option value="1">1 Người</option>
                                        <option value="2">2 Người</option>
                                        <option value="3">3 Người</option>
                                        <option value="4">4 Người</option>
                                        <option value="5">5 Người</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Tìm kiếm" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="instagram pt-5">
    <div class="container-fluid">
        <div class="row no-gutters justify-content-center pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2><span>Instagram</span></h2>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-sm-12 col-md ftco-animate">
                <a href="frontend/images/insta-1.jpg" class="insta-img image-popup"
                   style="background-image: url('frontend/images/insta-1.jpg');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="frontend/images/insta-2.jpg" class="insta-img image-popup"
                   style="background-image: url('frontend/images/insta-2.jpg');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="frontend/images/insta-3.jpg" class="insta-img image-popup"
                   style="background-image: url('frontend/images/insta-3.jpg');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="frontend/images/insta-4.jpg" class="insta-img image-popup"
                   style="background-image: url('frontend/images/insta-4.jpg');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="frontend/images/insta-5.jpg" class="insta-img image-popup"
                   style="background-image: url('frontend/images/insta-5.jpg');">
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
<?php /**PATH C:\laragon\www\LVTN-FINAL\nhanhao\resources\views/web/rooms.blade.php ENDPATH**/ ?>