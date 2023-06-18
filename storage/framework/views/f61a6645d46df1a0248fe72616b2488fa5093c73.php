
<?php $__env->startSection('content'); ?>
    <div class="row">
        <form class="container-fluid" action="<?php echo e(route('services.update',$service->id)); ?>" method="POST"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <p class="text-uppercase font-14"><?php echo e(trans('site.main_content')); ?></p>
                        <div class="tab-content detail-list pro-order-box" id="pills-tabContent">
                            <div class="col-12">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.service.name')); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="name"
                                               class="form-control name"
                                               value="<?php echo e($service->name); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.service.description')); ?></label>
                                    <div class="input-group">
                                                    <textarea name="description"
                                                              class="form-control"><?php echo e($service->description); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.service.price')); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="price"
                                               class="form-control"
                                               value="<?php echo e($service->price); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Đơn giá</label>
                                    <select name="unit_price"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        <?php $__currentLoopData = config('system.unit_price'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php echo e(old('unit_price') == $k ? 'selected':''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.service.is_enabled')); ?></label>
                                    <select name="is_enabled"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="0" <?php echo e(($service->is_enabled == 0) ? 'selected' : ''); ?>><?php echo e(trans('site.no')); ?></option>
                                        <option value="1" <?php echo e(($service->is_enabled == 1) ? 'selected' : ''); ?>><?php echo e(trans('site.yes')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <button type="submit" class="btn btn-blue waves-effect waves-light px-4 mt-3 mb-3">
                            <i class="mdi mdi-check-all mr-2"></i><?php echo e(trans('site.button_update')); ?></button>
                        <a href="<?php echo e(route('services.index')); ?>">
                            <button type="button"
                                    class="btn btn-danger ml-2 px-4 mb-3 mt-3"><i class="fas fa-window-close"></i>
                                <?php echo e(trans('site.reset')); ?>

                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\luanvan\resources\views/admin/services/edit.blade.php ENDPATH**/ ?>