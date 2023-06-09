<div>
    <h2>HUỶ PHÒNG THÀNH CÔNG</h2>
    <h3>Quý khách đã huỷ đặt phòng thành công tại khách sạn H&N</h3>
    <h4>Khách hàng: <?php echo e($data['name']); ?></h4>
    <h4>SĐT: <?php echo e($data['phone']); ?></h4>
    <h4>Phòng: <?php echo e($data['room']); ?></h4>
    <h4>Dịch vụ:</h4>
    <?php $__currentLoopData = $data['services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h5>- <?php echo e($service->name); ?></h5>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <h4>Ngày nhận phòng: <?php echo e($data['date_start']); ?></h4>
    <h4>Ngày trả phòng: <?php echo e($data['date_end']); ?></h4>
    <h4>Giá: <?php echo e($data['total_price']); ?> VNĐ</h4>
    <h4>Ngày huỷ: <?php echo e($data['date']); ?></h4>
</div>
<?php /**PATH C:\Users\ntnng\Desktop\nhanhao\resources\views/web/mail-cancel.blade.php ENDPATH**/ ?>