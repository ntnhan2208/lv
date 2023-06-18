
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <h3>Hóa đơn tiền thuê căn hộ</h3>
                    <form action="<?php echo e(route('bill-store',$bookingOfRoom->room->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Tháng thu tiền thuê</label>
                                    <div class="input-group">
                                        <input class="form-control" type="month" name="month"
                                               id="date_start" value="<?php echo e(old('date_start')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày lập hóa đơn</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="date"
                                               id="date_start" value="<?php echo e(old('date_start')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Thời gian đóng tiền</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="deadline"
                                               id="date_start" value="<?php echo e(old('date_start')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-6">
                                        <label style="font-weight: bold;">ĐIỆN</label>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Số điện cũ</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="old_electric" name="old_electric"
                                                               value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Số điện mới</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="new_electric" name="new_electric"
                                                               value=" ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label style="font-weight: bold">Tiền điện</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="electric"
                                                               value=" " readonly>
                                                        <input class="form-control" type="text" id="electric-input" name="electric"
                                                               hidden readonly>
                                                        <input class="form-control" type="text" id="electric-price"
                                                               value="3500" hidden readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label style="font-weight: bold;">NƯỚC</label>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Số nước cũ</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="old_water" name="old_water">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Số nước mới</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="new_water" name="new_water">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label style="font-weight: bold">Tiền nước</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="water"
                                                               value=" " readonly>
                                                        <input class="form-control" type="text" id="water-input" name="water"
                                                               hidden readonly>
                                                        <input class="form-control" type="text" id="water-price"
                                                               value="3500" hidden readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label style="font-weight: bold;">DỊCH VỤ KHÁC</label>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!in_array($service->id,[1,2])): ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label><?php echo e($service->name); ?></label>
                                                <div class="input-group">
                                                    <input class="form-control" onchange="priceService(<?php echo e($service->id); ?>)" type="text" id="service-<?php echo e($service->id); ?>"
                                                           value=" ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Thành tiền</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" id="price-<?php echo e($service->id); ?>"
                                                           value=" " name="" readonly>
                                                    <input class="form-control service-input" type="text" id="price-input-<?php echo e($service->id); ?>"
                                                           value=" " hidden readonly>
                                                    <input class="form-control" type="text" id="price-service-<?php echo e($service->id); ?>"
                                                           value="<?php echo e($service->price); ?>" hidden readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Tiền thuê căn hộ</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="total_room" readonly>
                                        <input class="form-control" type="text" id="total_room_input" name="total_room"
                                               value="<?php echo e($bookingOfRoom->total_room); ?>" hidden readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Tổn tiền dịch vụ</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="total_service"
                                               value=" " readonly>
                                        <input class="form-control" type="text" id="total_service_input" name="total_service"
                                               value=" " hidden readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Số tiền cần thanh toán</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="total"
                                               value=" " readonly>
                                        <input class="form-control" type="text" id="total-input" name="total"
                                               value=" " hidden readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.booking.paid')); ?> </label>
                                    <div class="input-group">
                                        <select name="status"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                            <?php $__currentLoopData = config('system.paid'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>" <?php echo e(old('paid') == $k ? 'selected':''); ?>><?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input class="form-control" type="text" name="booking_id"
                                   value="<?php echo e($bookingOfRoom->id); ?>" hidden readonly>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            Lập hóa đơn
                        </button>
                        <a href="<?php echo e(route('customers.index')); ?>">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        window.onload = function (e) {
            e.preventDefault();
            var room = $('#total_room_input').val();
            $('#total_room').val(numberToCurrency(room));
        }
        //điện
        $(document).on('change', '#new_electric', function (e) {
            console.log(typeof $('#ser').val())
            e.preventDefault();
            var oldElectric = $('#old_electric').val();
            var newElectric = $('#new_electric').val();
            var electricPrice = $('#electric-price').val();
            var totalPrice = (newElectric-oldElectric)*electricPrice;
            $("#electric").val(numberToCurrency(totalPrice));
            $("#electric-input").val(totalPrice);

            total();


        });

        //nước
        $(document).on('change', '#new_water', function (e) {
            e.preventDefault();
            var oldWater = $('#old_water').val();
            var newWater = $('#new_water').val();
            var waterPrice = $('#water-price').val();
            var totalPrice = (newWater-oldWater)*waterPrice;
            $("#water").val(numberToCurrency(totalPrice));
            $("#water-input").val(totalPrice);

            total();

        });

        function priceService(id) {
           var service = $('#service-' +id).val();
           var priceService = $('#price-service-' +id).val();
           var totalPrice = service * priceService;
           $('#price-' +id).val(numberToCurrency(totalPrice));
           $('#price-input-' +id).val(totalPrice);
           $('#price-' +id).attr('name','service['+ id +']'+'['+ service +']');

           total();
        }


       function total(){
           var room = $("#total_room_input").val();
           var electric = $("#electric-input").val();
           var water = $("#water-input").val();
           var service = 0;
           $('input[type="text"].service-input').each(function () {
               service += $(this).val()*1;
           });
           $("#total_service_input").val(electric*1 + water*1 +service*1);
           $("#total_service").val(numberToCurrency((electric*1 + water*1 +service*1)));

           $("#total-input").val(room*1+electric*1 + water*1 +service*1);
           $("#total").val(numberToCurrency((room*1+electric*1 + water*1 +service*1)));
       }

        function currencyToNumber(currency) {
            return Number(currency.replace(/[^0-9\.]+/g, ""));
        }

        function numberToCurrency(number) {
            return new Intl.NumberFormat().format(number);
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\luanvan\resources\views/admin/bills/add.blade.php ENDPATH**/ ?>