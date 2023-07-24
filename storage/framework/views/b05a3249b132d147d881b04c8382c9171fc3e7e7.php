
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('appointments.update', $appointment->id)); ?>" method="POST"
                          enctype="multipart/form-data">
                        <?php echo e(method_field('PUT')); ?>

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="name"
                                               class="form-control"
                                               placeholder="<?php echo e(trans('site.customer.name')); ?>"
                                               value="<?php echo e($appointment->name); ?>" <?php echo e((in_array($appointment->status,[2,3,4]) || \Illuminate\Support\Facades\Auth::user()->role==1 )? "style=pointer-events:none" : ''); ?>>
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
                                               value="<?php echo e($appointment->phone); ?>" <?php echo e((in_array($appointment->status,[2,3,4]) || \Illuminate\Support\Facades\Auth::user()->role==1)? "style=pointer-events:none" : ''); ?>>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày hẹn</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="date"
                                               id="date_start" value="<?php echo e($appointment->date); ?>" <?php echo e((in_array($appointment->status,[2,3,4]) || \Illuminate\Support\Facades\Auth::user()->role==1)? "style=pointer-events:none" : ''); ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Căn hộ xem</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm"
                                            id="price" name="room_id" <?php echo e((in_array($appointment->status,[2,3,4]) || \Illuminate\Support\Facades\Auth::user()->role==1)? "style=pointer-events:none" : ''); ?>>
                                        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($room->id); ?>"
                                                    <?php echo e($room->id == $appointment->room_id ? 'selected':''); ?>><?php echo e($room->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nhân viên môi giới</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm"
                                            id="price" name="employee_id" <?php echo e((in_array($appointment->status,[2,3,4]) || \Illuminate\Support\Facades\Auth::user()->role==1)? "style=pointer-events:none" : ''); ?>>
                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($employee->id); ?>"
                                                    <?php echo e($employee->id == $appointment->employee_id ? 'selected':''); ?>><?php echo e($employee->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm"
                                            name="status" <?php echo e(in_array($appointment->status,[2,3,4]) ? "style=pointer-events:none" : ''); ?>>
                                        <?php if(in_array($appointment->status,[2,3,4])): ?>
                                            <?php $__currentLoopData = config('system.appointment'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(in_array($k,[2,3,4])): ?>
                                                    <option value="<?php echo e($k); ?>"
                                                            <?php echo e($k == $appointment->status ? 'selected':''); ?> readonly><?php echo e($v); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <?php $__currentLoopData = config('system.appointment'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(in_array($k,[0,1,4])): ?>
                                                    <option value="<?php echo e($k); ?>"
                                                            <?php echo e($k == $appointment->status ? 'selected':''); ?> <?php echo e($k < $appointment->status ? 'disabled':''); ?>><?php echo e($v); ?></option>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            Cập nhật
                        </button>
                        <a href="<?php echo e(route('appointments.index')); ?>">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> Trở về
                            </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\lv\resources\views/admin/appointments/edit.blade.php ENDPATH**/ ?>