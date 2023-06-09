
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="<?php echo e(route('bookings.create')); ?>"><?php echo e(trans('site.book')); ?></a>
                </div>
                <h4 class="page-title">Danh sách phòng trống</h4>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.image')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.type')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.amount')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.price')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td>
                                            <img src="<?php echo e(Sanitize::showImage($room->image)); ?>" width="100"/>
                                        </td>
                                        <td>
                                        <?php echo e($room->name); ?>

                                        </td>
                                        <td>
                                        <?php echo e($room->type->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($room->amount); ?>

                                        </td>
                                        <td>
                                            <?php echo e($room->price); ?>

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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ntnng\Desktop\nhanhao\resources\views/admin/rooms/ready-rooms.blade.php ENDPATH**/ ?>