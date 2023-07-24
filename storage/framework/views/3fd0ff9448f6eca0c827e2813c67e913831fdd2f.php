
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="<?php echo e(route('services.create')); ?>"><?php echo e(trans('site.add')); ?></a>
                </div>
                <h4 class="page-title"><?php echo e(trans('site.service.title')); ?></h4>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th data-priority="1"><?php echo e(trans('site.service.name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.service.price')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.service.is_enabled')); ?></th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td>
                                            <?php echo e($service->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($service->price .'/'.config('system.unit_price')[$service->unit_price]); ?>

                                        </td>
                                        <td>
                                            <?php if($service->is_enabled ): ?>
                                                <div class="custom-control custom-switch switch-primary">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchStatusSwitchStatus<?php echo e($service->id); ?>"
                                                           checked>
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus<?php echo e($service->id); ?>"></label>
                                                </div>
                                            <?php else: ?>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchcustomSwitchStatus<?php echo e($service->id); ?>">
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus<?php echo e($service->id); ?>"></label>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <form class="float-right"
                                                  action="<?php echo e(route('services.destroy',$service->id)); ?>"
                                                  method="POST"
                                                  onSubmit="if(!confirm('<?php echo e(trans('site.confirm')); ?>')) {return false;}">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <div class="float-right mr-3">
                                                <a href="<?php echo e(route('services.edit', $service->id)); ?>"
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\lv\resources\views/admin/services/index.blade.php ENDPATH**/ ?>