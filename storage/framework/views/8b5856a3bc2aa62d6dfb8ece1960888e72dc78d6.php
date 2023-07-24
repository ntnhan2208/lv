
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <label>DANH SÁCH CĂN HỘ ĐANG CHO THUÊ</label>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <hr>
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th data-priority="1" class="text-center"></th>
                                    <th data-priority="1">Loại căn hộ</th>
                                    <th data-priority="1">Căn hộ</th>
                                    <th data-priority="1"><?php echo e(trans('site.booking.name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.booking.phone')); ?></th>
                                    <th data-priority="6">Ngày ký hợp đồng</th>
                                    <th data-priority="6">Ngày kết thúc hợp đồng</th>
                                    <th data-priority="1">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($booking->room->type->name); ?></td>
                                        <td><?php echo e($booking->room->name); ?></td>
                                        <td><?php echo e($booking->customer->name); ?></td>
                                        <td><?php echo e($booking->customer->phone); ?></td>
                                        <td><?php echo e($booking->date_start); ?></td>
                                        <td><?php echo e($booking->date_end); ?></td>
                                        <td class="text-right">
                                            <div class="float-right">
                                                <a class="btn btn-xs btn-primary mr-3"
                                                   href="<?php echo e(route('customer-booked', $booking->room->id)); ?>">
                                                    <i class="ti-user mr-2"></i>Nhân khẩu
                                                </a>
                                                <a class="btn btn-xs btn-warning mr-3"
                                                   href="<?php echo e(route('bill-index',$booking->room->id)); ?>">
                                                    <i class="ti-pencil-alt mr-2"></i>Hóa đơn
                                                </a>
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
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('scripts'); ?>
            <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
                  integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
                  crossorigin="anonymous">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
                    integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
                    crossorigin="anonymous"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\lv\resources\views/admin/bookings/booked.blade.php ENDPATH**/ ?>