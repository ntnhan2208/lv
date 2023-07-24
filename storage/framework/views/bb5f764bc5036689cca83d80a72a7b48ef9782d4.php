
<?php $__env->startSection('content'); ?>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col-lg-4"><h4 class="page-title">Quản lý đặt cọc</h4></div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-8">
                            </div>
                            <div class="col-lg-4">
                                <div class="float-right">
                                    <a class="btn btn-primary"
                                       href="<?php echo e(route('deposits.create')); ?>">Tạo đặt cọc mới</a>
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
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th data-priority="1">Khách đặt cọc</th>
                                            <th data-priority="1">Số điện thoại</th>
                                            <th data-priority="1">Ngày nhận cọc</th>
                                            <th data-priority="1">Ngày vào ở dự kiến</th>
                                            <th data-priority="1">Tiền cọc</th>
                                            <th data-priority="1">Loại căn hộ</th>
                                            <th data-priority="1">Căn hộ cọc</th>
                                            <th data-priority="1">Loại cọc</th>
                                            <th data-priority="1"></th>
                                            <th data-priority="1"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $depositses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposits): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php echo e($loop->iteration); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($deposits->name); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($deposits->phone); ?>

                                                </td>
                                                <td>
                                                <?php echo e($deposits->date); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($deposits->date_start); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($deposits->price); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($deposits->room->type->name); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($deposits->room->name); ?>

                                                </td>
                                                <td>
                                                    <span class="badge badge-soft-<?php echo e($deposits->type==1 ? 'success' : 'warning'); ?>"><?php echo e(config('system.deposits.'.$deposits->type)); ?></span>
                                                </td>
                                                <td>
                                                    <?php if($deposits->status == 0): ?>
                                                    <a href="<?php echo e(route('add-booking-from-deposits', $deposits->id)); ?>">
                                                        <button type="button" class="btn btn-secondary ml-2 px-4 mb-3 mt-2"><i class="mdi mdi-plus-circle-outline mr-2"></i> Tạo hợp đồng mới
                                                        </button>
                                                        <?php endif; ?>
                                                    </a>

                                                </td>
                                                <td>
                                                    <form class="float-right"
                                                          action="<?php echo e(route('deposits.destroy',$deposits->id)); ?>"
                                                          method="POST"
                                                          onSubmit="if(!confirm('<?php echo e(trans('site.confirm')); ?>')) {return false;}">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-xs btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    <div class="float-right mr-3">
                                                        <a href="<?php echo e(route('deposits.edit', $deposits->id)); ?>"
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\lv\resources\views/admin/deposits/index.blade.php ENDPATH**/ ?>