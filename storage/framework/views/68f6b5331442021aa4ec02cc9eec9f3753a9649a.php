
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('bookings.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.booking.name')); ?> </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="name"
                                               class="form-control"
                                               placeholder="<?php echo e(trans('site.customer.name')); ?>"
                                               value="<?php echo e($deposits->name); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.booking.personal_id')); ?> </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="personal_id"
                                               class="form-control"
                                               placeholder="<?php echo e(trans('site.booking.personal_id')); ?>"
                                               value="<?php echo e(old('personal_id')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.booking.phone')); ?> </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="phone"
                                               class="form-control"
                                               placeholder="<?php echo e(trans('site.booking.phone')); ?>"
                                               value="<?php echo e($deposits->phone); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.booking.email')); ?> </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="email"
                                               class="form-control"
                                               placeholder="<?php echo e(trans('site.booking.email')); ?>"
                                               value="<?php echo e(old('email')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="total-price">
                            <div id="book-room">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Ngày ký hợp đồng</label>
                                            <div class="input-group">
                                                <input class="form-control" type="date" name="date_start"
                                                       id="date_start" value="<?php echo e($deposits->date_start); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Ngày hết hạn hợp đồng dự kiến</label>
                                            <div class="input-group">
                                                <input class="form-control" type="date" name="date_end"
                                                       id="date_end" value="<?php echo e(old('date_end')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo e(trans('site.booking.rooms')); ?> </label>
                                            <select class="custom-select custom-select-sm form-control form-control-sm"
                                                    id="price" name="room_id" style="pointer-events: none">

                                                    <option value="<?php echo e($room->id); ?>"
                                                            data-price="<?php echo e($room->price); ?>" selected><?php echo e($room->name); ?></option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" name="price-cal">
                                            <label>Giá thuê Căn hộ theo tháng</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="result0" name="total_room2"
                                                       value="<?php echo e(old('total_room2')); ?>" readonly>
                                                <input class="form-control" name="total_room" type="text" id="result1"
                                                       value="<?php echo e(old('total_room')); ?>" readonly hidden>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id="book-service">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo e(trans('site.booking.services')); ?> </label>
                                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="custom-control custom-checkbox" id="service">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="<?php echo e($service->id); ?>"
                                                           data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                           name="services[]" value="<?php echo e($service->id); ?>"
                                                           data-price="<?php echo e($service->price); ?>" <?php echo e(((is_array(old('services')) && in_array($service->id,old('services'))) || in_array($service->id, [1,2])) ? 'checked':''); ?>>
                                                    <label class="custom-control-label"
                                                           for="<?php echo e($service->id); ?>"><?php echo e($service->name.' (Đơn vị tính: '.config('system.unit_price')[$service->unit_price].')'); ?></label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group" name="price-cal">
                                            <label>Số tiền cần cọc trước</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="result2" name="total_deposits2" value="<?php echo e(old('total_deposits2')); ?>"
                                                       readonly>
                                                <input class="form-control" name="total_deposits" type="text"
                                                       id="result3" value="<?php echo e(old('total_deposits')); ?>"
                                                       readonly hidden>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group" name="price-cal">
                                            <label>Số tền cần cọc đã trả</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="result4"
                                                       readonly>
                                                <input class="form-control" name="deposits" type="text"
                                                       id="result-before" value="<?php echo e($deposits->price); ?>"
                                                       readonly hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.booking.request')); ?> </label>
                                    <div class="input-group">
                                 <textarea name="request"
                                           class="form-control"
                                           placeholder="<?php echo e(trans('site.booking.request')); ?>"><?php echo e(old('request')); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Số tiền cần thanh toán</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="total_price" name="total_price2" value="<?php echo e(old('total_price2')); ?>"
                                           readonly>
                                    <input class="form-control" type="text" id="total_price2" name="total_price" value="<?php echo e(old('total_price')); ?>"
                                           readonly hidden>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.booking.paid')); ?> </label>
                                    <div class="input-group">
                                        <select name="paid"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                            <?php $__currentLoopData = config('system.paid'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>" <?php echo e(old('paid') == $k ? 'selected':''); ?>><?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            <?php echo e(trans('site.button_book')); ?>

                        </button>
                        <a href="<?php echo e(route('bookings.index')); ?>">
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
            var price3 = $("#result-before").val();
            $("#result4").val(numberToCurrency(price3));

        }
        //room
        $(document).on('change', '#book-room', function (e) {
            e.preventDefault();

            var selected = $("#price").find('option:selected');
            var price = selected.data('price');
            $("#result0").val(numberToCurrency(price));
            $("#result1").val(price);
            $("#result2").val(numberToCurrency(price));
            $("#result3").val(price);
        });


        $(document).on('change', '#total-price', function (e) {
            e.preventDefault();
            var price1 = $("#result0").val();
            var price2 = $('#result2').val();
            var price3 = $('#result4').val();
            var total = currencyToNumber(price1) + currencyToNumber(price2) - currencyToNumber(price3);
            $("#total_price").val(numberToCurrency(total));
            $("#total_price2").val(total);
        });

        function currencyToNumber(currency) {
            return Number(currency.replace(/[^0-9\.]+/g, ""));
        }

        function numberToCurrency(number) {
            return new Intl.NumberFormat().format(number);
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\lv\resources\views/admin/bookings/add-from-deposits.blade.php ENDPATH**/ ?>