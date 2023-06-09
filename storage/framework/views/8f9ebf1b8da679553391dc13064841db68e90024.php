<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col-lg-4"><h4 class="page-title"><?php echo e(trans('site.booking.title')); ?></h4></div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-8">













                            </div>
                            <div class="col-lg-4">
                                <div class="float-right">
                                    <a class="btn btn-primary"
                                       href="<?php echo e(route('bookings.create')); ?>"><?php echo e(trans('site.book')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a class="nav-link active" href="#booked" role="tab" data-toggle="tab">Quản lý hợp đồng</a>
                        </li>


                        <li><a class="nav-link" href="#booking" role="tab" data-toggle="tab">Quản lý thuê phòng</a></li>
                    </ul>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="booked">
                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <label>DANH SÁCH HỢP ĐỒNG</label>
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <hr>
                                        <table id="tech-companies-1" class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th data-priority="1" class="text-center"></th>
                                                <th data-priority="1">Phòng</th>
                                                <th data-priority="1"><?php echo e(trans('site.booking.name')); ?></th>
                                                <th data-priority="1"><?php echo e(trans('site.booking.phone')); ?></th>
                                                <th data-priority="6">Ngày ký hợp đồng</th>
                                                <th data-priority="6">Ngày kết thúc hợp đồng</th>
                                                <th data-priority="6"><?php echo e(trans('site.booking.paid')); ?></th>
                                                <th data-priority="1">

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e($booking->room->name); ?></td>
                                                    <td><?php echo e($booking->customer->name); ?></td>
                                                    <td><?php echo e($booking->customer->phone); ?></td>
                                                    <td><?php echo e($booking->date_start); ?></td>
                                                    <td><?php echo e($booking->date_end); ?></td>
                                                    <td>
                                                        <span class="badge badge-soft-<?php echo e($booking->paid==1 ? 'success' : 'danger'); ?>"><?php echo e(config('system.paid.'.$booking->paid)); ?></span>
                                                    </td>
                                                    <td class="text-right">











                                                        <div class="float-right">
                                                            <a class="btn btn-xs btn-primary mr-3"
                                                               href="<?php echo e(route('bookings.edit',$booking->id)); ?>">
                                                                <i class="far fa-edit"></i>
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
                </div>






























































                <div class="tab-pane" id="booking">
                    <div class="col-lg-12">
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
                                                <th data-priority="1">Phòng</th>
                                                <th data-priority="1"><?php echo e(trans('site.booking.name')); ?></th>
                                                <th data-priority="1"><?php echo e(trans('site.booking.phone')); ?></th>
                                                <th data-priority="1">

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e($booking->room->name); ?></td>
                                                    <td><?php echo e($booking->customer->name); ?></td>
                                                    <td><?php echo e($booking->customer->phone); ?></td>
                                                    <td class="text-right">
                                                        <div class="float-right">
                                                            <a class="btn btn-xs btn-primary mr-3"
                                                               href="#">
                                                                <i class="far fa-edit"></i>
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



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\luanvan\resources\views/admin/bookings/index.blade.php ENDPATH**/ ?>