
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="<?php echo e(route('appointments.create')); ?>"><?php echo e(trans('site.add')); ?></a>
                </div>
                <h4 class="page-title">Quản lý lịch hẹn</h4>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th data-priority="1">Khách hẹn</th>
                                    <th data-priority="1">Số điện thoại</th>
                                    <th data-priority="1">Căn hộ</th>
                                    <th data-priority="1">Ngày</th>
                                    <th data-priority="1">Nhân viên môi giới</th>
                                    <th data-priority="1"></th>
                                    <th data-priority="1"></th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td>
                                            <?php echo e($appointment->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($appointment->phone); ?>

                                        </td>
                                        <td>
                                            <?php echo e($appointment->room->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($appointment->date); ?>

                                        </td>
                                        <td>
                                            <?php echo e($appointment->employee->name); ?>

                                        </td>
                                        <td>

                                            <span class="badge badge-soft-<?php echo e($appointment->status == 2 ? 'success' : ($appointment->status == 3  ? 'secondary' : (in_array($appointment->status, [0,1]) ? 'warning' :'danger'))); ?>"><?php echo e(config('system.appointment')[$appointment->status]); ?></span>
                                        </td>
                                        <td>
                                            <?php if(!in_array($appointment->status,[2,3,4])): ?>
                                                <a href="<?php echo e(route('add-bookings', $appointment->id)); ?>">
                                                    <button type="button" class="btn btn-secondary ml-2 px-4 mb-3 mt-2">
                                                        <i class="mdi mdi-plus-circle-outline mr-2"></i> Tạo hợp đồng
                                                        mới
                                                    </button>
                                                </a>
                                                <a href="<?php echo e(route('add-deposits', $appointment->id)); ?>">
                                                    <button type="button" class="btn btn-primary ml-2 px-4 mb-3 mt-2"><i
                                                                class="mdi mdi-plus-circle-outline mr-2"></i> Đặt cọc
                                                    </button>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <form class="float-right"
                                                  action="<?php echo e(route('appointments.destroy',$appointment->id)); ?>"
                                                  method="POST"
                                                  onSubmit="if(!confirm('<?php echo e(trans('site.confirm')); ?>')) {return false;}">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <div class="float-right mr-3">
                                                <a href="<?php echo e(route('appointments.edit', $appointment->id)); ?>"
                                                   class="btn btn-xs btn-primary"><i class="far fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\luanvan\resources\views/admin/appointments/index.blade.php ENDPATH**/ ?>