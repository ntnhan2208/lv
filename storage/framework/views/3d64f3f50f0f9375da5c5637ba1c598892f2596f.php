
<?php $__env->startSection('content'); ?>
    <div class="row">
        <form class="container-fluid" action="<?php echo e(route('rooms.update',$room->id)); ?>" method="POST"
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
                                    <label><?php echo e(trans('site.room.name')); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="name"
                                               class="form-control name"
                                               value="<?php echo e($room->name); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.amount')); ?></label>
                                    <input type="text" name="amount"
                                           class="form-control"
                                           value="<?php echo e($room->amount); ?>">
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.price')); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="price"
                                               class="form-control"
                                               value="<?php echo e($room->price); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.description')); ?></label>
                                    <div class="input-group">
                                                    <textarea name="description"
                                                              class="form-control"><?php echo e($room->description); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.type')); ?></label>
                                    <select class="form-control" name="type_id" id="types">
                                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type->id); ?>"
                                                    <?php if($type->rooms->contains($room->id)): ?>)
                                                    selected <?php endif; ?>><?php echo e($type->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.service.is_enabled')); ?></label>
                                    <select name="is_enabled"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="0" <?php echo e(($room->is_enabled == 0) ? 'selected' : ''); ?>><?php echo e(trans('site.no')); ?></option>
                                        <option value="1" <?php echo e(($room->is_enabled == 1) ? 'selected' : ''); ?>><?php echo e(trans('site.yes')); ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.room.image')); ?></label>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input type="text"
                                                       class="form-control"
                                                       name="image"
                                                       id="avatar"
                                                       readonly hidden
                                                       value="<?php echo e(($room->image) ? $room->image : ''); ?>"/>
                                                <button type="button" data-avatar="avatar"
                                                        class="btn btn-blue btn-square waves-effect waves-light px-4 mt-3 mb-3 get_image">
                                                    <?php echo e(trans('site.button_choose')); ?>

                                                </button>
                                                <button type="button" data-avatar="avatar"
                                                        <?php echo e(($room->image) ? '' : 'disabled'); ?> class="btn btn-danger btn-square waves-effect waves-light px-4 mt-3 mb-3 ml-3 remove_image">
                                                    <?php echo e(trans('site.button_remove')); ?>

                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img id="image_avatar"
                                                 src="<?php echo e(($room->image) ? asset($room->image) : asset('admin/assets/images/no_img.jpg')); ?>"
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
                            <i class="mdi mdi-check-all mr-2"></i><?php echo e(trans('site.button_update')); ?></button>
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ntnng\Desktop\nhanhao\resources\views/admin/rooms/edit.blade.php ENDPATH**/ ?>