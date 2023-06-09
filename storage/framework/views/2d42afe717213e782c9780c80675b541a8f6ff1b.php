<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('frontend.home')); ?>">H&N</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Danh mục
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="<?php echo e(route('frontend.home')); ?>" class="nav-item nav-link">Trang chủ</a></li>
                <li class="nav-item"><a href="<?php echo e(route('web_rooms.index')); ?>" class="nav-item nav-link">Phòng</a></li>
                <li class="nav-item"><a href="<?php echo e(route('frontend.about')); ?>" class="nav-link">Về chúng tôi</a></li>
                <li class="nav-item"><a href="<?php echo e(route('frontend.contact')); ?>" class="nav-item nav-link">Liên hệ</a></li>
                <li class="nav-item"><a href="<?php echo e(route('search_booking')); ?>" class="nav-item nav-link">Tra cứu đặt
                        phòng</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php /**PATH C:\laragon\www\LVTN-FINAL\nhanhao\resources\views/web/layouts/menu/menu.blade.php ENDPATH**/ ?>