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
                    <h1 class="mb-4 bread">Kết quả tra cứu</h1>
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
                <h5>THÔNG TIN ĐƠN ĐẶT PHÒNG</h5>
                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm col-md-6 col-lg-4 ftco-animate ">
                        <h6>-Khách hàng: <?php echo e($customer->name); ?></h6>
                        <h6>-SĐT: <?php echo e($customer->phone); ?></h6>
                        <h6 hidden>-Email: <span id="email"><?php echo e($customer->email); ?></span></h6>
                        <h6>-Email: <span id="show-email"></span></h6>
                        <h6>-Phòng đặt: <?php echo e($booking->room->name); ?></h6>
                        <h6>Dịch vụ:</h6>
                        <?php $__currentLoopData = $booking->services()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h7>- <?php echo e($service->name); ?></h7>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <form class="form-inline" onsubmit="openModal()" id="myForm">
                            <button type="submit" class="btn btn-primary">Huỷ đặt phòng</button>
                        </form>
                    </div>
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Xác thực email</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p>Nhập email để huỷ đặt phòng</p>
                                <input id="i" type="text" class="form-control">

                            </div>
                            <div class="modal-footer">
                                <form id="t" class="float-right"
                                      action="<?php echo e(route('cancel_booking',$booking->id)); ?>"
                                      onsubmit="return check();" method="post">
                                    <?php echo e(method_field('PUT')); ?>

                                    <?php echo e(csrf_field()); ?>

                                    <button id="b" type="submit" class="btn btn-xs btn-danger">Huỷ đặt phòng<i
                                                class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
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
<script>
    $('#myForm').on('submit', function (e) {
        e.preventDefault();
        $('#myModal').modal('show');
    });

    function protect_email(user_email) {
        var avg, splitted, part1, part2;
        splitted = user_email.split("@");
        part1 = splitted[0];
        avg = part1.length / 2;
        part1 = part1.substring(0, (part1.length - avg));
        part2 = splitted[1];
        return part1 + "***@" + part2;

    };

    window.onload = function () {
        var email = $('#email').html();
        var show_email = protect_email(email);
        $('#show-email').html(show_email);
    }


    function check() {
        var email = $('#email').html();
        var input = $('#i').val();
        if (email != input) {
            alert('Email không trùng khớp!');
            return false;
        }
        return true;
    }


</script><?php /**PATH C:\Users\ntnng\Desktop\nhanhao\resources\views/web/search-boooking-result.blade.php ENDPATH**/ ?>