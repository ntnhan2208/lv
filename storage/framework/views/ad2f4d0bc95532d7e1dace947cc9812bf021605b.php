<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('re_store',$customer->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.booking.name')); ?> </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="name" class="form-control"
                                               value="<?php echo e($customer->name); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.booking.personal_id')); ?> </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="personal_id"
                                               class="form-control"
                                               value="<?php echo e($customer->personal_id); ?>" readonly>
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
                                               value="<?php echo e($customer->phone); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.booking.email')); ?> </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="email" class="form-control"
                                               value="<?php echo e($customer->email); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="total-price">
                            <div id="book-room">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo e(trans('site.booking.date_start')); ?> </label>
                                            <div class="input-group">
                                                <input class="form-control" type="date" name="date_start"
                                                       id="date_start" value="<?php echo e(old('date_start')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo e(trans('site.booking.date_end')); ?> </label>
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
                                                    id="price" name="room_id">
                                                <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($room->id); ?>"
                                                            data-price="<?php echo e($room->price); ?>" <?php echo e(old('room_id') == $room->id ? 'selected':''); ?>><?php echo e($room->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" name="price-cal">
                                            <label><?php echo e(trans('site.booking.total_room')); ?> </label>
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
                                                           data-price="<?php echo e($service->price); ?>" <?php echo e((is_array(old('services')) && in_array($service->id,old('services'))) ? 'checked':''); ?>>
                                                    <label class="custom-control-label"
                                                           for="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" name="price-cal">
                                            <label><?php echo e(trans('site.booking.total_service')); ?> </label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="result2" name="total_service2" value="<?php echo e(old('total_service2')); ?>"
                                                       readonly>
                                                <input class="form-control" name="total_service" type="text"
                                                       id="result3"
                                                       value="<?php echo e(old('total_service')); ?>"
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
                                <label><?php echo e(trans('site.booking.total')); ?> </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="total_price" name="total_price2"
                                           value="<?php echo e(old('total_price2')); ?>" readonly>
                                    <input class="form-control" type="text" id="total_price2" name="total_price"
                                           value="<?php echo e(old('total_price')); ?>" readonly hidden>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.booking.paid')); ?> </label>
                                    <div class="input-group">
                                        <select name="paid"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                            <?php $__currentLoopData = config('system.paid'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
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
        //room
        $(document).on('change', '#book-room', function (e) {
            e.preventDefault();
            var date_start = $("#date_start").val();
            var date_end = $("#date_end").val();

            if (date_start == "" || date_end == "") {
                var result = 0;
            } else {
                var selected = $("#price").find('option:selected');
                var price = selected.data('price');
                var dt1 = new Date(date_start);
                var dt2 = new Date(date_end);
                var time_difference = dt2.getTime() - dt1.getTime();
                var result = time_difference / (1000 * 60 * 60 * 24) * price;

            }


            $("#result0").val(numberToCurrency(result));
            $("#result1").val(result);
        });

        //service
        var checkboxes = document.querySelectorAll(".custom-control-input");
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                if (checkbox.checked) {
                    var price = $(checkbox).data('price');
                    var total = price * 1 + currencyToNumber($("#result2").val());
                } else if (!checkbox.checked) {
                    var price2 = $(checkbox).data('price');
                    var total = currencyToNumber($("#result2").val()) - price2 * 1;
                }
                $("#result2").val(numberToCurrency(total));
                $("#result3").val(total);

            })
        });

        $(document).on('change', '#total-price', function (e) {
            e.preventDefault();
            var price1 = $("#result0").val();
            var price2 = $('#result2').val();
            var total = currencyToNumber(price1) + currencyToNumber(price2);
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\LVTN-FINAL\nhanhao\resources\views/admin/bookings/re-add.blade.php ENDPATH**/ ?>