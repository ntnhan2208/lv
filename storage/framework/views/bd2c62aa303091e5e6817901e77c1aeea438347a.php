<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 mt-3">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="dripicons-enter report-main-icon"></i>
                            </div>
                            <span class="badge badge-danger">Yêu cầu đặt phòng</span>
                            <h3 class="my-3"><?php echo e($request_bookings); ?></h3>
                            <a href="<?php echo e(route('request_bookings.index')); ?>">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="dripicons-wallet report-main-icon"></i>
                            </div>
                            <span class="badge badge-warning">Đơn chưa thanh toán</span>
                            <h3 class="my-3"><?php echo e($bookings_not_paid); ?></h3>
                            <a href="<?php echo e(route('bookings.index')); ?>">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="dripicons-user-group report-main-icon"></i>
                            </div>
                            <span class="badge badge-secondary">Tổng khách hàng</span>
                            <h3 class="my-3"><?php echo e($customers); ?></h3>
                            <a href="<?php echo e(route('customers.index')); ?>">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="dripicons-bookmarks report-main-icon"></i>
                            </div>
                            <span class="badge badge-success">Phòng còn có sẵn</span>
                            <h3 class="my-3"><?php echo e($rooms_ready); ?></h3>
                            <a href="<?php echo e(route('show_ready_rooms')); ?>">Đặt phòng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-4">THEO DÕI ĐẶT PHÒNG</h4>
                    <div class="chart-demo">
                        <div id="apex_line1" class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-4">PHÒNG ĐƯỢC ĐẶT NHIỀU NHẤT</h4>
                    <div class="table-responsive browser_users">
                        <table class="table mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th class="border-top-0">Tên phòng</th>
                                <th class="border-top-0">Số lượng đã đặt phòng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $room_booked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(\App\Models\Room::find($k)->name); ?></td>
                                    <td><?php echo e($v->count()); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>

        var count = []
        <?php $__currentLoopData = $bookings_count; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking_count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        count.push('<?php echo e($booking_count); ?>')
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        var date = []
        <?php $__currentLoopData = $date_past; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date_count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        date.push('<?php echo e($date_count); ?>')
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        var options = {
            chart: {
                height: 374,
                type: 'line',
                shadow: {
                    enabled: false,
                    color: '#bbb',
                    top: 3,
                    left: 2,
                    blur: 3,
                    opacity: 1
                },
            },
            stroke: {
                width: 5,
                curve: 'smooth'
            },
            series: [{
                name: 'Số lượng đặt phòng',
                data: count,
            }],
            xaxis: {
                type: 'datetime',
                categories: date,
                axisBorder: {
                    show: true,
                    color: '#bec7e0',
                },
                axisTicks: {
                    show: true,
                    color: '#bec7e0',
                },
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: ['#43cea2'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
            markers: {
                size: 4,
                opacity: 0.9,
                colors: ["#ffbc00"],
                strokeColor: "#fff",
                strokeWidth: 2,
                style: 'inverted', // full, hollow, inverted
                hover: {
                    size: 7,
                }
            },
            yaxis: {
                min: 0,
                max: 40,
                title: {
                    text: 'Số lượng đặt phòng',
                },
            },
            grid: {
                row: {
                    colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.2
                },
                borderColor: '#185a9d'
            },
            responsive: [{
                breakpoint: 600,
                options: {
                    chart: {
                        toolbar: {
                            show: false
                        }
                    },
                    legend: {
                        show: false
                    },
                }
            }]
        }

        var chart = new ApexCharts(
            document.querySelector("#apex_line1"),
            options
        );
        chart.render();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ntnng\Desktop\nhanhao\resources\views/admin/home.blade.php ENDPATH**/ ?>