@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <h3>Hóa đơn tiền thuê Căn hộ</h3>
                    <form action="{{route('bill-store',$bookingOfRoom->room->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Tháng thu tiền thuê</label>
                                    <div class="input-group">
                                        <input class="form-control" type="month" name="month"
                                               id="date_start" value="{{old('date_start')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày lập hóa đơn</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="date"
                                               id="date_start" value="{{old('date_start')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Thời gian đóng tiền</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="deadline"
                                               id="date_start" value="{{old('date_start')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-6">
                                        <label style="font-weight: bold;">ĐIỆN</label>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Số điện cũ</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="old_electric" name="old_electric"
                                                               value="{{$oldElectric}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Số điện mới</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="new_electric" name="new_electric"
                                                               value=" ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label style="font-weight: bold">Tiền điện</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="electric"
                                                               value=" " readonly>
                                                        <input class="form-control" type="text" id="electric-input" name="electric"
                                                               hidden readonly>
                                                        <input class="form-control" type="text" id="electric-price"
                                                               value="{{$services[0]->price}}" hidden readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label style="font-weight: bold;">NƯỚC</label>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Số nước cũ</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="old_water" name="old_water" value="{{$oldWater}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Số nước mới</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="new_water" name="new_water">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label style="font-weight: bold">Tiền nước</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="water"
                                                               value=" " readonly>
                                                        <input class="form-control" type="text" id="water-input" name="water"
                                                               hidden readonly>
                                                        <input class="form-control" type="text" id="water-price"
                                                               value="{{$services[1]->price}}" hidden readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label style="font-weight: bold;">DỊCH VỤ KHÁC</label>
                                @foreach($services as $service)
                                    @if(!in_array($service->id,[1,2]))
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>{{$service->name}}</label>
                                                <div class="input-group">
                                                    <input class="form-control" onchange="priceService({{$service->id}})" type="text" id="service-{{$service->id}}"
                                                           value=" ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Thành tiền</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" id="price-{{$service->id}}"
                                                           value=" " name="" readonly>
                                                    <input class="form-control service-input" type="text" id="price-input-{{$service->id}}"
                                                           value=" " hidden readonly>
                                                    <input class="form-control" type="text" id="price-service-{{$service->id}}"
                                                           value="{{$service->price}}" hidden readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Tiền thuê Căn hộ</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="total_room" readonly>
                                        <input class="form-control" type="text" id="total_room_input" name="total_room"
                                               value="{{$bookingOfRoom->total_room}}" hidden readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Tổn tiền dịch vụ</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="total_service"
                                               value=" " readonly>
                                        <input class="form-control" type="text" id="total_service_input" name="total_service"
                                               value=" " hidden readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Tổng tiền nợ</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="indebt-show"
                                               value=" " readonly>
                                        <input class="form-control" type="text" id="indebt"
                                               value="{{$inDebt}}" hidden readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Số tiền cần thanh toán</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="total"
                                               value=" " readonly>
                                        <input class="form-control" type="text" id="total-input" name="total"
                                               value=" " hidden readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{ trans('site.booking.paid') }} </label>
                                    <div class="input-group">
                                        <select name="status"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                            @foreach(config('system.paid') as $k => $v)
                                                <option value="{{ $k }}" {{ old('paid') == $k ? 'selected':'' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input class="form-control" type="text" name="booking_id"
                                   value="{{$bookingOfRoom->id}}" hidden readonly>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            Lập hóa đơn
                        </button>
                        <a href="{{ url()->previous() }}">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> {{trans('site.reset') }} </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        window.onload = function (e) {
            e.preventDefault();
            var room = $('#total_room_input').val();
            $('#total_room').val(numberToCurrency(room));

            var indebt = $('#indebt').val();
            $('#indebt-show').val(numberToCurrency(indebt));
        }
        //điện
        $(document).on('change', '#new_electric', function (e) {
            console.log(typeof $('#ser').val())
            e.preventDefault();
            var oldElectric = $('#old_electric').val();
            var newElectric = $('#new_electric').val();
            var electricPrice = $('#electric-price').val();
            var totalPrice = (newElectric-oldElectric)*electricPrice;
            $("#electric").val(numberToCurrency(totalPrice));
            $("#electric-input").val(totalPrice);

            total();


        });

        //nước
        $(document).on('change', '#new_water', function (e) {
            e.preventDefault();
            var oldWater = $('#old_water').val();
            var newWater = $('#new_water').val();
            var waterPrice = $('#water-price').val();
            var totalPrice = (newWater-oldWater)*waterPrice;
            $("#water").val(numberToCurrency(totalPrice));
            $("#water-input").val(totalPrice);

            total();

        });

        function priceService(id) {
           var service = $('#service-' +id).val();
           var priceService = $('#price-service-' +id).val();
           var totalPrice = service * priceService;
           $('#price-' +id).val(numberToCurrency(totalPrice));
           $('#price-input-' +id).val(totalPrice);
           $('#price-' +id).attr('name','service['+ id +']'+'['+ service +']');

           total();
        }


       function total(){
           var room = $("#total_room_input").val();
           var electric = $("#electric-input").val();
           var water = $("#water-input").val();
           var indebt = $('#indebt').val();
           var service = 0;
           $('input[type="text"].service-input').each(function () {
               service += $(this).val()*1;
           });
           $("#total_service_input").val(electric*1 + water*1 +service*1 + indebt*1);
           $("#total_service").val(numberToCurrency((electric*1 + water*1 +service*1)));

           $("#total-input").val(room*1+electric*1 + water*1 +service*1 + indebt*1);
           $("#total").val(numberToCurrency((room*1+electric*1 + water*1 +service*1 + indebt*1)));
       }

        function currencyToNumber(currency) {
            return Number(currency.replace(/[^0-9\.]+/g, ""));
        }

        function numberToCurrency(number) {
            return new Intl.NumberFormat().format(number);
        }

    </script>
@endsection
