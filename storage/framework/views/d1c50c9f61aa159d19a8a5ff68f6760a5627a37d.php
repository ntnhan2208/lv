<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col-lg-4"><h4 class="page-title"><?php echo e(trans('site.booking.title')); ?></h4></div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="<?php echo e(route('check')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo method_field('GET'); ?>
                                    <div class="row">
                                        <div class="col-lg-8"><input class="form-control" type="text" name="check_phone"
                                                                     placeholder="Nhập SĐT để kiểm tra khách hàng">
                                        </div>
                                        <div class="col-lg-4">
                                            <button class="btn btn-warning waves-effect waves-light" type="submit">Kiểm
                                                tra
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
                <div class="col-lg-8">
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a class="nav-link active" href="#not_paid" role="tab" data-toggle="tab">Đặt phòng chưa
                                thanh
                                toán</a>
                        </li>
                        <li><a class="nav-link" href="#paid" role="tab" data-toggle="tab">Đặt phòng đã thanh toán</a>
                        </li>
                        <li><a class="nav-link" href="#canceled" role="tab" data-toggle="tab">Đặt phòng đã huý từ khách hàng</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <form action="" class="form-inline float-right">
                        <div class="form-group">
                            <input class="form-control" name="key" placeholder="Search...">
                        </div>
                        <button type="submit" class="btn btn-danger mr-3">
                            <i class="fas fa-search"></i>
                        </button>
                        <a type="button" class="btn btn-primary" href="<?php echo e(route('bookings.index')); ?>">
                            <i class="ti-reload"></i>
                        </a>
                    </form>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="not_paid">
                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <label>ĐẶT PHÒNG CHƯA THANH TOÁN</label>
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
                                                <th data-priority="6"><?php echo e(trans('site.booking.date_start')); ?></th>
                                                <th data-priority="6"><?php echo e(trans('site.booking.date_end')); ?></th>
                                                <th data-priority="6"><?php echo e(trans('site.booking.total')); ?></th>
                                                <th data-priority="6"><?php echo e(trans('site.booking.paid')); ?></th>
                                                <th data-priority="1">

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $bookings_not_paid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking_not_paid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e($booking_not_paid->room->name); ?></td>
                                                    <td><?php echo e($booking_not_paid->customer->name); ?></td>
                                                    <td><?php echo e($booking_not_paid->customer->phone); ?></td>
                                                    <td><?php echo e($booking_not_paid->date_start); ?></td>
                                                    <td><?php echo e($booking_not_paid->date_end); ?></td>
                                                    <td><?php echo e($booking_not_paid->total_price); ?></td>

                                                    <td>
                                                        <span class="badge badge-soft-<?php echo e($booking_not_paid->paid==1 ? 'success' : 'danger'); ?>"><?php echo e(config('system.paid.'.$booking_not_paid->paid)); ?></span>
                                                    </td>
                                                    <td class="text-right">
                                                        <form class="float-right"
                                                              action="<?php echo e(route('bookings.destroy',$booking_not_paid->id)); ?>"
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
                                                            <a class="btn btn-xs btn-primary mr-3"
                                                               href="<?php echo e(route('bookings.edit',$booking_not_paid->id)); ?>">
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
                <div class="tab-pane" id="paid">
                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <label>ĐẶT PHÒNG ĐÃ THANH TOÁN</label>
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
                                                <th data-priority="6"><?php echo e(trans('site.booking.date_start')); ?></th>
                                                <th data-priority="6"><?php echo e(trans('site.booking.date_end')); ?></th>
                                                <th data-priority="6"><?php echo e(trans('site.booking.total')); ?></th>
                                                <th data-priority="6"><?php echo e(trans('site.booking.paid')); ?></th>
                                                <th data-priority="1">

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $bookings_paid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking_paid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e($booking_paid->room->name); ?></td>
                                                    <td><?php echo e($booking_paid->customer->name); ?></td>
                                                    <td><?php echo e($booking_paid->customer->phone); ?></td>
                                                    <td><?php echo e($booking_paid->date_start); ?></td>
                                                    <td><?php echo e($booking_paid->date_end); ?></td>
                                                    <td><?php echo e($booking_paid->total_price); ?></td>
                                                    <td>
                                                        <span class="badge badge-soft-<?php echo e($booking_paid->paid==1 ? 'success' : 'danger'); ?>"><?php echo e(config('system.paid.'.$booking_paid->paid)); ?></span>
                                                    </td>

                                                    <td class="text-right">
                                                        <form class="float-right"
                                                              action="<?php echo e(route('bookings.destroy',$booking_paid->id)); ?>"
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
                <div class="tab-pane" id="canceled">
                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <label>ĐẶT PHÒNG ĐÃ BỊ HUỶ</label>
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
                                                <th data-priority="5"><?php echo e(trans('site.booking.date_start')); ?></th>
                                                <th data-priority="5"><?php echo e(trans('site.booking.date_end')); ?></th>
                                                <th data-priority="5"><?php echo e(trans('site.booking.total')); ?></th>
                                                <th data-priority="1">

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $bookings_canceled; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking_canceled): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e($booking_canceled->room->name); ?></td>
                                                    <td><?php echo e($booking_canceled->customer->name); ?></td>
                                                    <td><?php echo e($booking_canceled->customer->phone); ?></td>
                                                    <td><?php echo e($booking_canceled->date_start); ?></td>
                                                    <td><?php echo e($booking_canceled->date_end); ?></td>
                                                    <td><?php echo e($booking_canceled->total_price); ?></td>
                                                    <td class="text-right">
                                                        <form class="float-right"
                                                              action="<?php echo e(route('bookings.destroy',$booking_canceled->id)); ?>"
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



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\LVTN-FINAL\nhanhao\resources\views/admin/bookings/index.blade.php ENDPATH**/ ?>