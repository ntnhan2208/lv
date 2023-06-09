<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('web/layouts/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<?php echo $__env->make('web/layouts/menu/menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="hero-wrap" style="background-image:url('<?php echo e(asset('frontend/images/bg_1.jpg')); ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <h1 class="mb-4 bread">Đặt phòng</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 ftco-animate">
                <?php echo NoCaptcha::renderJs(); ?>

                <form action="<?php echo e(route('store_request')); ?>" enctype="multipart/form-data" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row" id="total-price">
                        <div class="block-21 col-lg-4">
                            <img src="<?php echo e($room->image); ?>" alt="" height="220px" width="350px">
                        </div>
                        <div class="col-lg-4 room">
                            <div class="item">
                                <div>
                                    <h4><?php echo e($room->name); ?></h4>
                                </div>
                                <input type="text" name="room_id" value="<?php echo e($room->id); ?>" hidden readonly>
                                <div>
                                    <h5>Loại phòng: <?php echo e($room->type->name); ?></h5>
                                </div>
                                <div>
                                    <div class="row" id="book-room">
                                        <div class="form-group col-lg-6">
                                            <div class="wrap">
                                                <label for="#">Ngày nhận phòng</label>
                                                <input name="date_start" id="date_start" type="date"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <div class="wrap">
                                                <label for="#">Ngày trả phòng</label>
                                                <input name="date_end" id="date_end" type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h3 class="mb-4">Dịch vụ</h3>
                            <div class="form-group col-lg-12">
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="custom-control custom-checkbox" id="service">
                                        <input type="checkbox" class="custom-control-input"
                                               id="<?php echo e($service->id); ?>"
                                               data-parsley-multiple="groups" data-parsley-mincheck="2"
                                               name="services[]" value="<?php echo e($service->id); ?>"
                                               data-price="<?php echo e($service->price); ?>">
                                        <label class="custom-control-label"
                                               for="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="col-lg-12">
                                <h3 class="mb-4">Thông tin liên hệ</h3>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input name="name" type="text" class="form-control" placeholder="Họ và tên">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input name="email" type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input name="phone" type="text" class="form-control"
                                               placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input name="personal_id" type="text" class="form-control"
                                               placeholder="CCCD/CMND">
                                    </div>
                                </div>
                                <div class="row">
                                    <h3 class="mb-4">Yêu cầu thêm</h3>
                                    <div class="form-group col-lg-12">
                                        <textarea name="request" id="" cols="30" rows="7" class="form-control"
                                                  placeholder="Yêu cầu thêm"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h4>Tổng tiền phòng:</h4>
                                </div>
                                <div class="col-lg-4">
                                    <h4 id="show_room_price"></h4>
                                    <input type="text" id="total_room" name="total_room" value="0"
                                           hidden>
                                    <input type="text" id="room_price" value="<?php echo e($room->price); ?>"
                                           hidden>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <h4>Tổng tiền dịch vụ:</h4>
                                </div>
                                <div class="col-lg-4">
                                    <h4 id="show_servcies_price"></h4>
                                    <input type="text" id="total_service" name="total_service" value="0"
                                           hidden>
                                </div>
                            </div>
                            <hr style="font-weight: bold;">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h3>Tổng tiền:</h3>
                                </div>
                                <div class="col-lg-4">
                                    <h3 id="total"></h3>
                                    <input type="text" id="total_price" name="total_price" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <p>Nhân viên của khách sạn sẽ chủ động liện hệ với quý khách trong vòng 30 phút nữa
                                        để
                                        xác nhận
                                        và hướng dẫn quý khách thanh toán.</p>
                                </div>
                            </div>
                            <?php echo NoCaptcha::display(); ?>

                            <?php if($errors->has('g-recaptcha-response')): ?>
                                <span class="help-block"><strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong></span>
                            <?php endif; ?>
                            <div class="row">
                                <button type="submit" class="btn btn-primary py-3 px-5">Đặt phòng</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 room-single ftco-animate mb-5 mt-5">
                <h4 class="mb-4">Phòng tương tự</h4>
                <div class="row">
                    <?php $__currentLoopData = $availables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $available): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm col-md-4 ftco-animate">
                            <div class="room">
                                <a href=""
                                   class="img img-2 d-flex justify-content-center align-items-center"
                                   style="background-image: url('<?php echo e($available->image); ?>');">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3 text-center">
                                    <h3 class="mb-3"><a href="rooms.html"><?php echo e($available->name); ?></a></h3>
                                    <p><span class="price mr-2"><?php echo e($available->price); ?></span></p>
                                    <hr>
                                    <p class="pt-1"><a href="<?php echo e(route('web_rooms.show',$available->id)); ?>"
                                                       class="btn-custom">Chi tiết phòng<span
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
<script>

    $(document).on('change', '#book-room', function (e) {
        e.preventDefault();
        var date_start = $("#date_start").val();
        var date_end = $("#date_end").val();

        if (!date_start || !date_end) {
            var result = 0;
        } else {
            var price = $("#room_price").val();
            var dt1 = new Date(date_start);
            var dt2 = new Date(date_end);
            var time_difference = dt2.getTime() - dt1.getTime();
            var result = time_difference / (1000 * 60 * 60 * 24) * price;
        }
        $("#show_room_price").html(numberToCurrency(result));
        $("#total_room").val(result);
    });

    //service
    var checkboxes = document.querySelectorAll(".custom-control-input");
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            if (checkbox.checked) {
                var price = $(checkbox).data('price');
                var total = price * 1 + currencyToNumber($("#show_servcies_price").html());
            } else if (!checkbox.checked) {
                var price2 = $(checkbox).data('price');
                var total = currencyToNumber($("#show_servcies_price").html()) - price2 * 1;
            }
            $("#show_servcies_price").html(numberToCurrency(total));
            $("#total_service").val(total);

        })
    });

    $(document).on('change', '#total-price', function (e) {
        e.preventDefault();
        var price1 = $("#total_room").val();
        var price2 = $('#total_service').val();
        var total = price1 * 1 + price2 * 1;
        $("#total").html(numberToCurrency(total));
        $("#total_price").val(total);
    });

    function currencyToNumber(currency) {
        return Number(currency.replace(/[^0-9\.]+/g, ""));
    }

    function numberToCurrency(number) {
        return new Intl.NumberFormat().format(number);
    }
</script>
<?php /**PATH C:\laragon\www\LVTN-FINAL\nhanhao\resources\views/web/booking.blade.php ENDPATH**/ ?>