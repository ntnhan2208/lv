
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <?php if($room->amount != count($customers)): ?>
                    <div class="float-right">
                        <a class="btn btn-primary" href="<?php echo e(route('customers.create','room='.$room->id)); ?>"><?php echo e(trans('site.add')); ?></a>
                    </div>
                <?php endif; ?>
                <h4 class="page-title">Danh sách khách thuê căn
                    hộ <?php echo e($room->name .' ('.count($customers).'/'.$room->amount.')'); ?></h4>
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
                                    <th data-priority="1" class="text-center"></th>
                                    <th data-priority="1"><?php echo e(trans('site.customer.name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.customer.phone')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.customer.personal_id')); ?></th>
                                    <th data-priority="1">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($customer->name); ?></td>
                                        <td><?php echo e($customer->phone); ?></td>
                                        <td><?php echo e($customer->personal_id); ?></td>
                                        <td class="text-right">
                                            <form class="float-right"
                                                  action="<?php echo e(route('customers.destroy',$customer->id)); ?>"
                                                  method="POST" onSubmit="if(!confirm('<?php echo e(trans('site.admin.confirm')); ?>'))
												  {return false;}">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-xs btn-danger"><i class="fas
												fa-trash"></i></button>
                                            </form>
                                            <div class="float-right">
                                                <a class="btn btn-xs btn-primary mr-3"
                                                   href="<?php echo e(route('customers.edit',$customer->id)); ?>">
                                                    <i class="far fa-edit"></i>
                                                </a>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\luanvan\resources\views/admin/bookings/customer/index.blade.php ENDPATH**/ ?>