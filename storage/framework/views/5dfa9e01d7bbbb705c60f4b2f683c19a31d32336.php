
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="<?php echo e(route('bill-create', $room->id)); ?>"><?php echo e(trans('site.add')); ?></a>
                </div>
                <h4 class="page-title">Danh sách hóa đơn <?php echo e($room->name); ?></h4>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th data-priority="1">Tháng</th>
                                    <th data-priority="1">Ngày lập hóa đơn</th>
                                    <th data-priority="1">Thời hạn thanh toán</th>
                                    <th data-priority="1">Tổng tiền</th>
                                    <th data-priority="1">Trạng thái</th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td>
                                            <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $bill->month )->year.'-'.\Carbon\Carbon::createFromFormat('Y-m-d', $bill->month )->month); ?>

                                        </td>
                                        <td>
                                            <?php echo e($bill->date); ?>

                                        </td>
                                        <td>
                                            <?php echo e($bill->deadline); ?>

                                        </td>
                                        <td>
                                            <?php echo e($bill->total); ?>

                                        </td>
                                        <td>
                                            <span class="badge badge-soft-<?php echo e($bill->status == 1 ? 'success' : 'danger'); ?>"><?php echo e(config('system.paid')[$bill->status]); ?></span>
                                        </td>
                                        <td>
                                            <div class="float-right mr-3">
                                                <a href="<?php echo e(route('bill-edit', $bill->id)); ?>"
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\luanvan\resources\views/admin/bills/index.blade.php ENDPATH**/ ?>