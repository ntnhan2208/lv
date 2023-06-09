<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col-lg-4"><h4 class="page-title">Yêu cầu đặt phòng</h4></div>

                </div>
            </div>
        </div>
        <div class="col-12">
            <ul class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active" href="#not_paid" role="tab" data-toggle="tab">Yêu cầu chưa duyệt</a>
                </li>
                <li><a class="nav-link" href="#paid" role="tab" data-toggle="tab">Yêu cầu đã duyệt</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="not_paid">
                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <label>ĐƠN HÀNG CHƯA DUYỆT</label>
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
                                                <th></th>
                                                <th data-priority="1">

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $request_bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request_booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e($request_booking->name); ?></td>
                                                    <td><?php echo e($request_booking->phone); ?></td>
                                                    <td><?php echo e($request_booking->date_start); ?></td>
                                                    <td><?php echo e($request_booking->date_end); ?></td>
                                                    <td>
                                                        <?php if(\App\Models\Customer::where('phone',$request_booking->phone)->first()): ?>
                                                            <span class="badge badge-soft-success">Khách hàng cũ</span>
                                                        <?php else: ?>
                                                            <span class="badge badge-soft-danger">Khách hàng mới</span>
                                                        <?php endif; ?>
                                                    </td>

                                                    <td class="text-right">
                                                        <form class="float-right"
                                                              action="<?php echo e(route('request_bookings.destroy',$request_booking->id)); ?>"
                                                              method="POST"
                                                              onSubmit="if(!confirm('<?php echo e(trans('site.admin.confirm')); ?>'))
												  {return false;}">
                                                            <?php echo e(method_field('DELETE')); ?>

                                                            <?php echo e(csrf_field()); ?>

                                                            <button type="submit" class="btn btn-xs btn-danger"><i
                                                                        class="fas
												fa-trash"></i></button>
                                                        </form>

                                                        <div class="float-right">
                                                            <?php if(\App\Models\Customer::where('phone',$request_booking->phone)->first()): ?>
                                                                <a class="btn btn-xs btn-primary mr-3"
                                                                   href="<?php echo e(route('create_for_old',$request_booking->id)); ?>">
                                                                    <i class="far fa-edit"></i>
                                                                </a>
                                                            <?php else: ?>
                                                                <a class="btn btn-xs btn-primary mr-3"
                                                                   href="<?php echo e(route('create_for_new',$request_booking->id)); ?>">
                                                                    <i class="far fa-edit"></i>
                                                                </a>
                                                            <?php endif; ?>


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
                <div class="tab-pane" id="paid">
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
                                                              method="POST"
                                                              onSubmit="if(!confirm('<?php echo e(trans('site.admin.confirm')); ?>'))
												  {return false;}">
                                                            <?php echo e(method_field('DELETE')); ?>

                                                            <?php echo e(csrf_field()); ?>

                                                            <button type="submit" class="btn btn-xs btn-danger"><i
                                                                        class="fas
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

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\LVTN-FINAL\nhanhao\resources\views/admin/request-bookings/index.blade.php ENDPATH**/ ?>