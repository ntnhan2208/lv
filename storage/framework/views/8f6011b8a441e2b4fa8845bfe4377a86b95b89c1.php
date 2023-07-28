
<?php $__env->startSection('content'); ?>
    <div class="row">
        <form class="container-fluid" action="<?php echo e(route('rooms.store')); ?>" method="POST"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <p class="text-uppercase font-14"><?php echo e(trans('site.main_content')); ?></p>
                        <div class="tab-content detail-list pro-order-box" id="pills-tabContent">
                            <div class="col-12">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.name')); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="name"
                                               class="form-control name"
                                               placeholder="<?php echo e(trans('site.room.name')); ?>"
                                               value="<?php echo e(old('name')); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.amount')); ?></label>
                                    <input type="text" name="amount"
                                           class="form-control integerInput"
                                           placeholder="<?php echo e(trans('site.room.amount')); ?>"
                                           value="<?php echo e(old('amount')); ?>">
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.acreage')); ?></label>
                                    <input type="text" name="acreage"
                                           class="form-control integerInput"
                                           placeholder="<?php echo e(trans('site.room.acreage')); ?>"
                                           value="<?php echo e(old('acreage')); ?>">
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.price')); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="price"
                                               class="form-control integerInput"
                                               placeholder="<?php echo e(trans('site.room.price')); ?>"
                                               value="<?php echo e(old('price')); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.description')); ?></label>
                                    <div class="input-group">
                                                    <textarea name="description"
                                                              class="form-control"
                                                              placeholder="<?php echo e(trans('site.room.description')); ?>"><?php echo e(old('description')); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.type')); ?></label>
                                    <select class="form-control" name="type_id" id="types">
                                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type->id); ?>" <?php echo e(old('type_id') == $type->id ? 'selected':''); ?>><?php echo e($type->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.is_enabled')); ?></label>
                                    <select name="is_enabled"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        <?php $__currentLoopData = config('system.is_enabled'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k); ?>" <?php echo e(old('is_enabled') == $k ? 'selected':''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.image')); ?></label>
                                    <div class="row">
                                        <div class="col-3">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <button type="submit" class="btn btn-blue waves-effect waves-light px-4 mt-3 mb-3">
                            <i class="mdi mdi-check-all mr-2"></i><?php echo e(trans('site.button_add')); ?></button>
                        <a href="<?php echo e(route('rooms.index')); ?>">
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\lv\resources\views/admin/rooms/add.blade.php ENDPATH**/ ?>