<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('employees.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.employee.name')); ?> </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="name" class="form-control"
                                               placeholder="<?php echo e(trans('site.employee.name')); ?>"
                                               value="<?php echo e(old('name')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.employee.personal_id')); ?> </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="personal_id"
                                               class="form-control integerInput"
                                               placeholder="<?php echo e(trans('site.employee.personal_id')); ?>"
                                               value="<?php echo e(old('personal_id')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.employee.gender')); ?> </label>
                                    <div class="input-group">
                                        <select name="gender"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                            <?php $__currentLoopData = config('system.gender'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>" <?php echo e(old('gender') == $k ? 'selected':''); ?>><?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.employee.email')); ?> </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="email" class="form-control"
                                               placeholder="<?php echo e(trans('site.employee.email')); ?>"
                                               value="<?php echo e(old('email')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.employee.phone')); ?> </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="phone"
                                               class="form-control"
                                               placeholder="<?php echo e(trans('site.employee.phone')); ?>"
                                               value="<?php echo e(old('phone')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.employee.image')); ?></label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="image"
                                                       id="image" readonly hidden/>
                                                <button type="button" data-avatar="image"
                                                        class="btn btn-blue btn-square waves-effect waves-light px-4 mt-3 mb-3 get_image">
                                                    <?php echo e(trans('site.button_choose')); ?>

                                                </button>
                                                <button type="button" data-avatar="image"
                                                        disabled='disabled'
                                                        class="btn btn-danger btn-square waves-effect waves-light px-4 mt-3 mb-3 ml-3 remove_image">
                                                    <?php echo e(trans('site.button_remove')); ?>

                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img id="image_avatar"
                                                 src="<?php echo e(asset('admin/assets/images/no_img.jpg')); ?>"
                                                 class="img-thumbnail"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Phần trăm hoa hồng</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="commission"
                                               class="form-control integerInput"
                                               value="<?php echo e(old('commission')); ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                                <i class="mdi mdi-plus-circle-outline mr-2"></i>
                                <?php echo e(trans('site.button_add')); ?>

                            </button>
                            <a href="<?php echo e(route('employees.index')); ?>">
                                <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\luanvan\resources\views/admin/employees/add.blade.php ENDPATH**/ ?>