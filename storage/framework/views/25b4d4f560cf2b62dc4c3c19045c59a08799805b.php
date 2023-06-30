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
                                    <th data-priority="1">Phần trăm hoa hồng</th>
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
                                            <?php echo e($employee->commission .'%'); ?>

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
                                            <div class="float-right">
                                                <!-- Button trigger modal -->
                                                <button class="btn btn-xs btn-primary mr-3" style="color: white"
                                                   onclick="show(<?php echo e($employee->id); ?>)">
                                                    Chi tiết tiền hoa hồng
                                                </button>
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

    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="myModal-<?php echo e($employee->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document" >
                <div class="modal-content" style="border-radius: 5px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chi tiết tiền hoa hồng <?php echo e($employee->name); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="tech-companies-1" class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th data-priority="1" class="text-center"></th>
                                <th data-priority="1">Thời gian</th>
                                <th data-priority="1">Phòng</th>
                                <th data-priority="1">Hoa hồng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $employee->employeesCommissions()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo e($loop->iteration); ?>

                                    </td>
                                    <td>
                                        <?php echo e(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y')); ?>

                                    </td>
                                    <td>
                                        <?php echo e(\App\Models\Room::find($value->room_id)->name); ?>

                                    </td>
                                    <td>
                                        <?php echo  number_format($value->commission, 0). '&#8363'; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function show(id){
            $('#myModal-'+id).modal('show');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\luanvan\resources\views/admin/employees/index.blade.php ENDPATH**/ ?>