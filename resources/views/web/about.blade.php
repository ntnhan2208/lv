<!DOCTYPE html>
<html lang="en">
@include('web/layouts/header')
<body>

@include('web/layouts/menu/menu')
<!-- END nav -->

<div class="hero-wrap" style="background-image: url('frontend/images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <h1 class="mb-4 bread">Về chúng tôi</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-counter img" id="section-counter"
         style="background-image: url(frontend/images/bg_2.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number">{{$rooms}}</strong>
                                <span>Căn hộ</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number">{{$services->count()}}</strong>
                                <span>Dịch vụ</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number">{{$employees}}</strong>
                                <span>Nhân viên</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftc-no-pb ftc-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                 style="background-image: url('frontend/images/bg_2.jpg');">
                <a href="https://vimeo.com/45830194"
                   class="icon popup-vimeo d-flex justify-content-center align-items-center">
                    <span class="icon-play"></span>
                </a>
            </div>
            <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section heading-section-wo-line pt-md-5 pl-md-5 mb-5">
                    <div class="ml-md-0">
                        <span class="subheading">Chào mừng bạn đến với khách sạn H&N</span>
                        <h2 class="mb-4">Rất vui khi được đồng hành cùng bạn</h2>
                    </div>
                </div>
                <div class="pb-md-5">
                    <p>Mở cửa đón những du khách đầu tiên vào tháng Bảy năm 2022, H&N có 153 biệt thự rộng rãi với tầm
                        nhìn hướng vườn hoặc hướng biển, và ban-công hoặc sân hiên riêng tư, một bể bơi nước mặn tự
                        nhiên rộng 2.500m2, 2 hồ bơi nước ngọt rộng 600m2 và 700m2, một bãi biển riêng với lớp cát trắng
                        mịn thoai thoải dẫn xuống làn nước đại dương trong xanh.</p>
                    <p>Hãy đến đây, bạn sẽ tìm thấy một thiên đường riêng dành cho chính bạn!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Dịch vụ của chúng tôi</h2>
        </div>
        <div class="row d-flex">
            @foreach($services as $service)
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">{{$service->name}}</h3>
                            <p>{{$service->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="instagram">
    <div class="container-fluid">
        <div class="row no-gutters justify-content-center pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2><span>Instagram</span></h2>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-1.jpg" class="insta-img image-popup"
                   style="background-image: url('frontend/images/insta-1.jpg');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-2.jpg" class="insta-img image-popup"
                   style="background-image: url('frontend/images/insta-2.jpg');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-3.jpg" class="insta-img image-popup"
                   style="background-image: url('frontend/images/insta-3.jpg');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-4.jpg" class="insta-img image-popup"
                   style="background-image: url('frontend/images/insta-4.jpg');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-5.jpg" class="insta-img image-popup"
                   style="background-image: url('frontend/images/insta-5.jpg');">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @include('web/layouts/footer')
</section>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>


@include('web/layouts/script')

</body>
</html>
