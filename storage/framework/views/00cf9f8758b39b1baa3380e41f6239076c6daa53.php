<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col-lg-4"><h4 class="page-title">Yêu cầu đặt phòng</h4></div>

                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body">
                    <label>ĐƠN HÀNG ĐÃ DUYỆT</label>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th data-priority="1" class="text-center"></th>
                                    <th data-priority="1"><?php echo e(trans('site.booking.name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.booking.phone')); ?></th>
                                    <th data-priority="5"><?php echo e(trans('site.booking.date_start')); ?></th>
                                    <th data-priority="5"><?php echo e(trans('site.booking.date_end')); ?></th>
                                    <th data-priority="1">

                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $request_bookings_confirmed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request_booking_confirmed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($request_booking_confirmed->name); ?></td>
                                        <td><?php echo e($request_booking_confirmed->phone); ?></td>
                                        <td><?php echo e($request_booking_confirmed->date_start); ?></td>
                                        <td><?php echo e($request_booking_confirmed->date_end); ?></td>
                                        <td class="text-right">
                                            <form class="float-right"
                                                  action="<?php echo e(route('request_bookings.destroy',$request_booking_confirmed->id)); ?>"
                                                  method="POST" onSubmit="if(!confirm('<?php echo e(trans('site.admin.confirm')); ?>'))
												  {return false;}">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-xs btn-danger"><i class="fas
												fa-trash"></i></button>
                                            </form>
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



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ntnng\Desktop\nhanhao\resources\views/admin/request-bookings/request-bookings-confirmed.blade.php ENDPATH**/ ?>