<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('web/layouts/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

<?php echo $__env->make('web/layouts/menu/menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- END nav -->

<div class="hero-wrap" style="background-image:url('<?php echo e(asset('frontend/images/canho/3.jpg')); ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <h1 class="mb-4 bread">Chi tiết căn hộ</h1>
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
                                <div class="room-img border-radius-15" style="background-image: url(<?php echo e($room->image); ?>);"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                        <div class="row">
                            <div class="sidebar-box ftco-animate">
                                <div class="categories">
                                    <li><p><?php echo e($room->description); ?></p></li>
                                    <li>Loại căn hộ: </span><?php echo e($room->type->name); ?></li>
                                    <li>Số người: </span><?php echo e($room->amount); ?></li>
                                    <li>Giá: <?php echo  number_format($room->price, 0). '&#8363'; ?></li>
                                </div>
                            </div>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Đặt lịch hẹn xem căn hộ
                        </button>

                        <!-- Modal -->

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Loại căn hộ</h3>
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
                <h4 class="mb-4">Căn hộ tương tự</h4>
                <div class="row">
                    <?php $__currentLoopData = $availables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $available): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm col-md-4 ftco-animate">
                            <div class="room">
                                <a href=""
                                   class="img img-2 d-flex justify-content-center align-items-center border-radius-15-top"
                                   style="background-image: url(<?php echo e($available->image); ?>);">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3 text-center border-radius-15-bottom">
                                    <h3 class="mb-3"><a href="rooms.html"><?php echo e($available->name); ?></a></h3>
                                    <p><span class="price mr-2"><?php echo  number_format($available->price, 0). '&#8363'; ?></span></p>
                                    <hr>
                                    <p class="pt-1"><a href=""
                                                       class="btn-custom">Chi tiết căn hộ<span
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?php echo e(route('appointment.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ĐẶT LỊCH HẸN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="name" name="name" type="text" class="form-control" placeholder="Họ và tên" required>
                    <input id="phone" name="phone" type="text" class="form-control mt-2" placeholder="Số điện thoại" required>
                    <input id="date" name="date" type="date" class="form-control mt-2" required>
                    <input id="room" name="room_id" type="text" value="<?php echo e($room->name); ?>" class="form-control mt-2" data-room="<?php echo e($room->id); ?>" readonly>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button id="submit" type="button" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </div>
    </form>
</div>

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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#submit').on('click', function (e){
       e.preventDefault();
        var name = $('#name').val();
        var phone = $('#phone').val();
        var date = $('#date').val();
        var room_id = $('#room').data('room');
        console.log(name, phone, date, room_id)
        $.ajax({
            type: 'POST',
            data: {
                name: name,
                phone: phone,
                date: date,
                room_id : room_id
            },
            url: '/appointment-store',
            success: function (data) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }
                location.reload();
            },
        });
    });

</script>
</body>
</html>
<?php /**PATH D:\DEV\luanvan\resources\views/web/room-detail.blade.php ENDPATH**/ ?>