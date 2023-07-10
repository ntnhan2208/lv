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
                    <h1 class="mb-4 bread">Tra cứu đặt Căn hộ</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="w-100"></div>
            <div class="col-lg-12">
                {!! NoCaptcha::renderJs() !!}
                <form action="{{route('search_boking_result')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3 class="mb-4">Vui lòng nhập số điện thoại đang đặt Căn hộ</h3>
                    <div class="form-group col-lg-12">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-lg-12">
                        <input name="phone" type="text" class="form-control" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="form-group col-lg-12">
                        {!! NoCaptcha::display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block"><strong>{{ $errors->first('g-recaptcha-response') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group col-lg-12">
                        <button class="btn btn-primary" type="submit">Tra cứu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@include('web/layouts/footer')



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

