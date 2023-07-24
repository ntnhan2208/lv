
<?php $__env->startSection('content'); ?>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="page-title-box">




                <h4 class="page-title">Danh sách căn hộ trống</h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.image')); ?></th>
                                    <th data-priority="1">Loại</th>
                                    <th data-priority="1"><?php echo e(trans('site.room.name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.amount')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.acreage')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.price')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.is_enabled')); ?></th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $readyRooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td>
                                            <img src="<?php echo e(Sanitize::showImage($room->image)); ?>" width="100"/>
                                        </td>
                                        <td>
                                            <?php echo e($room->type->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($room->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($room->amount); ?>

                                        </td>
                                        <td>
                                            <?php echo e($room->acreage); ?>

                                        </td>
                                        <td>
                                            <?php echo e($room->price); ?>

                                        </td>
                                        <td>
                                            <?php if($room->is_enabled ): ?>
                                                <div class="custom-control custom-switch switch-primary">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchStatusSwitchStatus<?php echo e($room->id); ?>"
                                                           checked>
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus<?php echo e($room->id); ?>"></label>
                                                </div>
                                            <?php else: ?>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchcustomSwitchStatus<?php echo e($room->id); ?>">
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus<?php echo e($room->id); ?>"></label>
                                                </div>
                                            <?php endif; ?>
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\lv\resources\views/admin/employees/room.blade.php ENDPATH**/ ?>