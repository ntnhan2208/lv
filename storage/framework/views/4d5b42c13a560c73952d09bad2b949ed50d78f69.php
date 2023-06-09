<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('customers.update',$customer->id)); ?>" method="POST"
                          enctype="multipart/form-data">
                        <?php echo e(method_field('PUT')); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans('site.customer.name')); ?> </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="name" class="form-control"
                                       value="<?php echo e($customer->name); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.customer.phone')); ?> </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="phone" class="form-control"
                                       value="<?php echo e($customer->phone); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.customer.email')); ?> </label>
                            <div class="input-group">
                                <input type="email" id="example-input1-group1" name="email" class="form-control"
                                       value="<?php echo e($customer->email); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.customer.personal_id')); ?> </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="personal_id" class="form-control"
                                       value="<?php echo e($customer->personal_id); ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            <?php echo e(trans('site.button_update')); ?>

                        </button>
                        <a href="<?php echo e(route('customers.index')); ?>">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <label>DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT</label>
                    <table id="tech-companies-1" class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th data-priority="1" class="text-center"></th>
                            <th data-priority="1">Ngày nhận</th>
                            <th data-priority="1">Ngày trả</th>
                            <th data-priority="1">Tổng giá</th>
                            <th data-priority="1">Trạng thái thanh toán</th>
                            <th data-priority="1">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($booking->date_start); ?></td>
                                <td><?php echo e($booking->date_end); ?></td>
                                <td><?php echo e($booking->total_price); ?></td>
                                <td>
                                    <span class="badge badge-soft-<?php echo e($booking->paid==1 ? 'success' : 'danger'); ?>"><?php echo e(config('system.paid.'.$booking->paid)); ?></span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <span class="badge badge-soft-danger">Chưa có đơn đặt hàng!</span>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ntnng\Desktop\nhanhao\resources\views/admin/customers/edit.blade.php ENDPATH**/ ?>