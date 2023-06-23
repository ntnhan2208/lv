<!DOCTYPE html>
<html dir="ltr" lang="en-US">
@include('web/layouts/header')
<body>
@include('web/layouts/menu/menu')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image:url('{{asset('frontend/images/canho/1.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-12 ftco-animate text-center">
                    <div class="text mb-5 pb-3">
                        <h1 class="mb-3">Căn hộ cho thuê</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item" style="background-image:url('{{asset('frontend/images/canho/2.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-12 ftco-animate text-center">
                    <div class="text mb-5 pb-3">
                        <h1 class="mb-3"> Trải Nghiệm Những Phút Giây Tuyệt Vời</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-booking">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('search_room')}}" class="booking-form" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end border-radius-15">
                                <div class="wrap">
                                    <label for="#">Loại căn hộ</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="type" class="form-control">
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end border-radius-15">
                                <div class="wrap">
                                    <label for="#">Số người</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="amount" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex">
                            <div class="form-group d-flex align-self-stretch border-radius-15">
                                <input type="submit" value="Tìm kiếm ngay"
                                       class="btn btn-primary py-3 px-4 align-self-stretch border-radius-15">
                            </div>
                        </div>
                    </div>
                </form>
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
                        <span class="subheading">CĂN HỘ CHO THUÊ</span>
                        <h2 class="mb-4">Rất vui khi được đồng hành cùng bạn</h2>
                    </div>
                </div>
                <div class="pb-md-5">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto beatae debitis dolores eius, expedita harum illo laboriosam libero minima molestiae molestias officiis quibusdam quidem quo rerum temporibus, totam vel voluptas?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, alias aliquid architecto aspernatur autem consequatur dolor, earum explicabo facilis fugit laborum numquam obcaecati omnis, quasi quod sequi veniam voluptates voluptatibus.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Căn hộ nổi bật</h2>
            </div>
        </div>
        <div class="row">
            @foreach($rooms as $room)
                <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                    <div class="room">
                        <a href="{{route('web_rooms.show',$room->id)}}"
                           class="img d-flex justify-content-center align-items-center border-radius-15-top"
                           style="background-image: url({{$room->image}})">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3 text-center border-radius-15-bottom">
                            <h3 class="mb-3"><a href="{{route('web_rooms.show',$room->id)}}">{{$room->name}}</a>
                            </h3>
                            <p><span class="price mr-2">@money($room->price)</span></p>
                            <hr>
                            <p class="pt-1"><a href="{{route('web_rooms.show',$room->id)}}" class="btn-custom">Chi
                                    tiết căn hộ <span class="icon-long-arrow-right"></span></a></p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>



    @include('web/layouts/footer')

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
