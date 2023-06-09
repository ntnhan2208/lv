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
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body">
                    <label>ĐẶT PHÒNG ĐÃ BỊ HUỶ</label>
                    <form action="" class="form-inline">
                        <div class="form-group">
                            <input class="form-control" name="key" placeholder="SearchController...">
                        </div>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
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
                                                  method="POST" onSubmit="if(!confirm('<?php echo e(trans('site.admin.confirm')); ?>'))
												  {return false;}">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-xs btn-danger"><i class="fas
												fa-trash"></i></button>
                                            </form>
                                            <div class="float-right">
                                                <a class="btn btn-xs btn-primary mr-3"
                                                   href="<?php echo e(route('bookings.edit',$booking_canceled->id)); ?>">
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
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\LVTN-FINAL\nhanhao\resources\views/admin/bookings/bookings-canceled.blade.php ENDPATH**/ ?>