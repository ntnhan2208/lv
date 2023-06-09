<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary" href="<?php echo e(route('employees.create')); ?>"><?php echo e(trans('site.add')); ?></a>
                </div>
                <h4 class="page-title"><?php echo e(trans('site.employee.title')); ?></h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <form action="" class="form-inline">
                                <div class="form-group">
                                    <input class="form-control" name="key" placeholder="Search...">
                                </div>
                                <button type="submit" class="btn btn-danger mr-3">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a type="button" class="btn btn-primary" href="<?php echo e(route('employees.index')); ?>">
                                    <i class="ti-reload"></i>
                                </a>
                            </form>
                            <hr>
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th data-priority="1" class="text-center"></th>
                                    <th data-priority="1"><?php echo e(trans('site.employee.name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.employee.phone')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.employee.personal_id')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.employee.position')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.employee.updated_by')); ?></th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td>
                                            <?php echo e($employee->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($employee->phone); ?>

                                        </td>
                                        <td>
                                            <?php echo e($employee->personal_id); ?>

                                        </td>
                                        <td>
                                            <?php echo e($employee->position); ?>

                                        </td>
                                        <td>
                                            <?php echo e(\Illuminate\Support\Facades\Auth::user()->find($employee->admin_id)->name); ?>

                                        </td>
                                        <td class="text-right">
                                            <form class="float-right"
                                                  action="<?php echo e(route('employees.destroy',$employee->id)); ?>"
                                                  method="POST" onSubmit="if(!confirm('<?php echo e(trans('site.admin.confirm')); ?>'))
												  {return false;}">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-xs btn-danger"><i class="fas
												fa-trash"></i></button>
                                            </form>
                                            <div class="float-right">
                                                <a class="btn btn-xs btn-primary mr-3"
                                                   href="<?php echo e(route('employees.edit',$employee->id)); ?>">
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\LVTN-FINAL\nhanhao\resources\views/admin/employees/index.blade.php ENDPATH**/ ?>