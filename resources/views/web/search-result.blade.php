<!DOCTYPE html>
<html lang="en">
@include('web/layouts/header')
<body>
@include('web/layouts/menu/menu')


<div class="hero-wrap" style="background-image:url('{{asset('frontend/images/canho/3.jpg')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center text">
                <h1 class="mb-4 bread">Kết quả tìm kiếm</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($rooms as $room)
                        <div class="col-sm col-md-6 col-lg-4 ftco-animate ">
                            <div class="room">
                                <a href="{{route('web_rooms.show',$room->id)}}"
                                   class="img d-flex justify-content-center align-items-center border-radius-15-top"
                                   style="background-image: url({{$room->image}});">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3 text-center border-radius-15-bottom">
                                    <h3 class="mb-3"><a href="rooms-single.html">{{$room->name}}</a></h3>
                                    <p><span class="price mr-2">@money($room->price)</span></p>
                                    <ul class="list">
                                        <li><span>Số người:</span> {{$room->amount}}</li>
                                        <li><span>Loại Căn hộ:</span> {{$room->type->name}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

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
