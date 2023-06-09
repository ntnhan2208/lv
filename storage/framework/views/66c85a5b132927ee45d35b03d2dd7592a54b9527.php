<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="<?php echo e(route('rooms.create')); ?>"><?php echo e(trans('site.add')); ?></a>
                </div>
                <h4 class="page-title"><?php echo e(trans('site.room.title')); ?></h4>
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
                                    <th data-priority="1"><?php echo e(trans('site.room.amount')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.price')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.is_enabled')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.room.updated_by')); ?></th>
                                    <th data-priority="1"></th>
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
                                            <?php echo e($room->amount); ?>

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
                                        <td>
                                            <?php echo e(\Illuminate\Support\Facades\Auth::user()->find($room->admin_id)->name); ?>

                                        </td>
                                        <td>
                                            <form class="float-right"
                                                  action="<?php echo e(route('rooms.destroy',$room->id)); ?>"
                                                  method="POST"
                                                  onSubmit="if(!confirm('<?php echo e(trans('site.confirm')); ?>')) {return false;}">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <div class="float-right mr-3">
                                                <a href="<?php echo e(route('rooms.edit', $room->id)); ?>"
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\LVTN-FINAL\nhanhao\resources\views/admin/rooms/index.blade.php ENDPATH**/ ?>