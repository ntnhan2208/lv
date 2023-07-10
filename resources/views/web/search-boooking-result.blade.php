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
                    <h1 class="mb-4 bread">Kết quả tra cứu</h1>
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
                <h5>THÔNG TIN ĐƠN ĐẶT Căn hộ</h5>
                @foreach($bookings as $booking)
                    <div class="col-sm col-md-6 col-lg-4 ftco-animate ">
                        <h6>-Khách hàng: {{$customer->name}}</h6>
                        <h6>-SĐT: {{$customer->phone}}</h6>
                        <h6 hidden>-Email: <span id="email">{{$customer->email}}</span></h6>
                        <h6>-Email: <span id="show-email"></span></h6>
                        <h6>-Căn hộ đặt: {{$booking->room->name}}</h6>
                        <h6>Dịch vụ:</h6>
                        @foreach($booking->services()->get() as $service)
                            <h7>- {{$service->name}}</h7>
                        @endforeach
                        <form class="form-inline" onsubmit="openModal()" id="myForm">
                            <button type="submit" class="btn btn-primary">Huỷ đặt Căn hộ</button>
                        </form>
                    </div>
                    <hr>
                @endforeach
                <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Xác thực email</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p>Nhập email để huỷ đặt Căn hộ</p>
                                <input id="i" type="text" class="form-control">

                            </div>
                            <div class="modal-footer">
                                <form id="t" class="float-right"
                                      action="{{route('cancel_booking',$booking->id)}}"
                                      onsubmit="return check();" method="post">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <button id="b" type="submit" class="btn btn-xs btn-danger">Huỷ đặt Căn hộ<i
                                            class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
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
<script>
    $('#myForm').on('submit', function (e) {
        e.preventDefault();
        $('#myModal').modal('show');
    });

    function protect_email(user_email) {
        var avg, splitted, part1, part2;
        splitted = user_email.split("@");
        part1 = splitted[0];
        avg = part1.length / 2;
        part1 = part1.substring(0, (part1.length - avg));
        part2 = splitted[1];
        return part1 + "***@" + part2;

    };

    window.onload = function () {
        var email = $('#email').html();
        var show_email = protect_email(email);
        $('#show-email').html(show_email);
    }


    function check() {
        var email = $('#email').html();
        var input = $('#i').val();
        if (email != input) {
            alert('Email không trùng khớp!');
            return false;
        }
        return true;
    }


</script>
