
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('deposits.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="name"
                                               class="form-control"
                                               placeholder="<?php echo e(trans('site.customer.name')); ?>"
                                               value="<?php echo e(old('name')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="phone"
                                               class="form-control integerInput"
                                               placeholder="Số điện thoại"
                                               value="<?php echo e(old('phone')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Căn hộ cọc</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm" id="room"
                                            name="room_id" style="" onChange="update()">
                                        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($room->id); ?>"
                                                    data-price="<?php echo e($room->price); ?>" <?php echo e(old('room_id') == $room->id ? 'selected':''); ?>><?php echo e($room->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày nhận cọc</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="date"
                                               id="date_start" value="<?php echo e(old('date_start')); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày dự kiến vào ở</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="date_start"
                                               id="date_start" value="<?php echo e(old('date_start')); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <div class="input-group">
                                 <textarea name="note"
                                           class="form-control"
                                           placeholder="Ghi chú"><?php echo e(old('note')); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Loại cọc</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm"
                                            name="type">
                                        <?php $__currentLoopData = config('system.deposits'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Số tiền cần đặt cọc của Căn hộ</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="total" id="total"
                                              value="" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Số tiền cọc</label>
                                    <div class="input-group">
                                        <input class="form-control integerInput" type="text" name="price"
                                              value="<?php echo e(old('price')); ?>">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            Đặt cọc
                        </button>
                        <a href="<?php echo e(url()->previous()); ?>">
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
        function update() {
            var select = document.getElementById('room');
            var option = select.options[select.selectedIndex];
            document.getElementById('total').value = option.getAttribute('data-price');
        }
        update();
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\lv\resources\views/admin/deposits/add.blade.php ENDPATH**/ ?>