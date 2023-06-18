
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('deposits.update', $deposits->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo e(method_field('PUT')); ?>

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="name"
                                               class="form-control"
                                               placeholder="<?php echo e(trans('site.customer.name')); ?>"
                                               value="<?php echo e($deposits->name); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="phone"
                                               class="form-control"
                                               placeholder="Số điện thoại"
                                               value="<?php echo e($deposits->phone); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Phòng cọc</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm"
                                            name="room_id" style="pointer-events: none">
                                        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($room->id); ?>"
                                                    <?php echo e($deposits->room_id == $room->id ? 'selected':''); ?>><?php echo e($room->name); ?></option>
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
                                               id="date_start" value="<?php echo e($deposits->date); ?>" style="pointer-events: none">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày dự kiến vào ở</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="date_start"
                                               id="date_start" value="<?php echo e($deposits->date_start); ?>" style="pointer-events: none">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <div class="input-group">
                                 <textarea name="note"
                                           class="form-control"
                                           placeholder="Ghi chú"><?php echo e($deposits->note); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Loại cọc</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm"
                                            name="type" style="pointer-events: none">
                                        <?php $__currentLoopData = config('system.deposits'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Số tiền cọc</label>
                                    <div class="input-group">
                                        <input class="form-control integerInput" type="text" name="price"
                                               value="<?php echo e($deposits->price); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route('appointments.index')); ?>">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> Quay về</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\luanvan\resources\views/admin/deposits/edit.blade.php ENDPATH**/ ?>