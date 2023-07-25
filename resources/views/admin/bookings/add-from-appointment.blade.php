@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="{{ route('bookings.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ trans('site.booking.name') }} </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="name"
                                               class="form-control"
                                               placeholder="{{ trans('site.customer.name') }}"
                                               value="{{$appointment->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ trans('site.booking.personal_id') }} </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="personal_id"
                                               class="form-control integerInput"
                                               placeholder="{{ trans('site.booking.personal_id') }}"
                                               value="{{old('personal_id')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ trans('site.booking.phone') }} </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="phone"
                                               class="form-control integerInput" maxlength="10"
                                               placeholder="{{ trans('site.booking.phone') }}"
                                               value="{{$appointment->phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ trans('site.booking.email') }} </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="email"
                                               class="form-control"
                                               placeholder="{{ trans('site.booking.email') }}"
                                               value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="total-price">
                            <div id="book-room">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Ngày ký hợp đồng</label>
                                            <div class="input-group">
                                                <input class="form-control" type="date" name="date_start"
                                                       id="date_start" value="{{old('date_start')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Ngày hết hạn hợp đồng dự kiến</label>
                                            <div class="input-group">
                                                <input class="form-control" type="date" name="date_end"
                                                       id="date_end" value="{{old('date_end')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ trans('site.booking.rooms') }} </label>
                                            <select class="custom-select custom-select-sm form-control form-control-sm"
                                                    id="price" name="room_id">
                                                @foreach($rooms as $room)
                                                    <option value="{{$room->id}}"
                                                            data-price="{{$room->price}}" {{$appointment->room_id == $room->id ? 'selected':''}}>{{$room->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" name="price-cal">
                                            <label>Giá thuê Căn hộ theo tháng</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="result0" name="total_room2"
                                                       value="{{old('total_room2')}}" readonly>
                                                <input class="form-control" name="total_room" type="text" id="result1"
                                                       value="{{old('total_room')}}" readonly hidden>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id="book-service">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ trans('site.booking.services') }} </label>
                                            @foreach($services as $service)
                                                <div class="custom-control custom-checkbox" id="service">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="{{$service->id}}"
                                                           data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                           name="services[]" value="{{$service->id}}"
                                                           data-price="{{$service->price}}" {{ ( (is_array(old('services')) && in_array($service->id,old('services'))) ||in_array($service->id, [1,2]) ) ? 'checked':'' }}>
                                                    <label class="custom-control-label"
                                                           for="{{$service->id}}">{{$service->name.' (Đơn vị tính: '.config('system.unit_price')[$service->unit_price].')'}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" name="price-cal">
                                            <label>Số tền cọc trước</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="result2"
                                                       name="total_deposits2" value="{{old('total_deposits2')}}"
                                                       readonly>
                                                <input class="form-control" name="total_deposits" type="text"
                                                       id="result3" value="{{old('total_deposits')}}"
                                                       readonly hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ trans('site.booking.request') }} </label>
                                    <div class="input-group">
                                 <textarea name="request"
                                           class="form-control"
                                           placeholder="{{ trans('site.booking.request') }}">{{ old('request') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Số tiền cần thanh toán</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="total_price" name="total_price2"
                                           value="{{old('total_price2')}}"
                                           readonly>
                                    <input class="form-control" type="text" id="total_price2" name="total_price"
                                           value="{{old('total_price')}}"
                                           readonly hidden>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>{{ trans('site.booking.paid') }} </label>
                                    <div class="input-group">
                                        <select name="paid"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                            @foreach(config('system.paid') as $k => $v)
                                                <option value="{{ $k }}" {{ old('paid') == $k ? 'selected':'' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            {{ trans('site.button_book') }}
                        </button>
                        <a href="{{ route('bookings.index') }}">
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
        //room
        $(document).on('change', '#book-room', function (e) {
            e.preventDefault();

            var selected = $("#price").find('option:selected');
            var price = selected.data('price');
            $("#result0").val(numberToCurrency(price));
            $("#result1").val(price);
            $("#result2").val(numberToCurrency(price));
            $("#result3").val(price);
        });


        $(document).on('change', '#total-price', function (e) {
            e.preventDefault();
            var price1 = $("#result0").val();
            var price2 = $('#result2').val();
            var total = currencyToNumber(price1) + currencyToNumber(price2);
            $("#total_price").val(numberToCurrency(total));
            $("#total_price2").val(total);
        });

        function currencyToNumber(currency) {
            return Number(currency.replace(/[^0-9\.]+/g, ""));
        }

        function numberToCurrency(number) {
            return new Intl.NumberFormat().format(number);
        }

    </script>
@endsection
