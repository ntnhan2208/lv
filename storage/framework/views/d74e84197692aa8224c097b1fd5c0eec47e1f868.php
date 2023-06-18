
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('appointments.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6">
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="phone"
                                               class="form-control"
                                               placeholder="Số điện thoại"
                                               value="<?php echo e(old('phone')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="total-price">
                            <div id="book-room">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Ngày hẹn</label>
                                            <div class="input-group">
                                                <input class="form-control" type="date" name="date"
                                                       id="date_start" value="<?php echo e(old('date_start')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Phòng xem</label>
                                            <select class="custom-select custom-select-sm form-control form-control-sm"
                                                    id="price" name="room_id">
                                                <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($room->id); ?>"
                                                            data-price="<?php echo e($room->price); ?>" <?php echo e(old('room_id') == $room->id ? 'selected':''); ?>><?php echo e($room->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nhân viên môi giới</label>
                                            <select class="custom-select custom-select-sm form-control form-control-sm"
                                                    name="employee_id">
                                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($employee->id); ?>"
                                                           <?php echo e(old('employee_id') == $employee->id ? 'selected':''); ?>><?php echo e($employee->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            Đặt lịch hẹn
                        </button>
                        <a href="<?php echo e(route('appointments.index')); ?>">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\luanvan\resources\views/admin/appointments/add.blade.php ENDPATH**/ ?>