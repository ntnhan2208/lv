@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="{{ route('bookings.update',$booking->id)}}" method="POST"
                          enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ trans('site.booking.name') }} </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="name" class="form-control"
                                               value="{{$customer->name}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ trans('site.booking.personal_id') }} </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="personal_id"
                                               class="form-control"
                                               value="{{$customer->personal_id}}" readonly>
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
                                               class="form-control"
                                               value="{{$customer->phone}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ trans('site.booking.email') }} </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="email" class="form-control"
                                               value="{{$customer->email}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="total-price">
                            <div id="book-room">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ trans('site.booking.date_start') }} </label>
                                            <div class="input-group">
                                                <input class="form-control" type="date" name="date_start"
                                                       id="date_start" value="{{$booking->date_start}}" style="pointer-events: none">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ trans('site.booking.date_end') }} </label>
                                            <div class="input-group">
                                                <input class="form-control" type="date" name="date_end"
                                                       id="date_end" value="{{$booking->date_end}}" style="pointer-events: none">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ trans('site.booking.rooms') }} </label>
                                            <select class="custom-select custom-select-sm form-control form-control-sm"
                                                    id="price" name="room_id" style="pointer-events: none">
                                                <option value="{{$current_room->id}}"
                                                        data-price="{{$current_room->price}}"
                                                        selected>{{$current_room->name}}</option>
                                                @foreach($rooms as $room)
                                                    <option value="{{$room->id}}"
                                                            data-price="{{$room->price}}">{{$room->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" name="price-cal">
                                            <label>{{ trans('site.booking.total_room') }} </label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="result0" readonly>
                                                <input class="form-control" name="total_room" type="text" id="result1"
                                                       value="{{$booking->total_room}}" readonly hidden>
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
                                                           data-price="{{$service->price}}"
                                                           @if($booking->services->contains($service->id)) checked @endif>
                                                    <label class="custom-control-label"
                                                           for="{{$service->id}}">{{$service->name.' (Đơn vị tính: '.config('system.unit_price')[$service->unit_price].')'}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group" name="price-cal">
                                            <label>Số tền cọc trước</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="result2"
                                                       readonly>
                                                <input class="form-control" name="total_deposits" type="text"
                                                       id="result3" value="{{$booking->total_deposits}}" readonly hidden>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group" name="price-cal">
                                            <label>Số tền cần cọc đã trả</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="result4"
                                                       readonly>
                                                <input class="form-control" name="deposits" type="text"
                                                       id="result-before" value="{{$booking->deposits}}"
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
                                           placeholder="{{ trans('site.booking.request') }}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>{{ trans('site.booking.total') }} </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="total_price"
                                           readonly>
                                    <input class="form-control" type="text" id="total_price2" name="total_price"
                                           value="{{$booking->total_price}}" readonly hidden>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>{{ trans('site.booking.paid') }} </label>
                                    <div class="input-group">
                                        <select name="paid"
                                                class="custom-select custom-select-sm form-control form-control-sm" {{$booking->paid == 1 ? "style=pointer-events:none":''}}>
                                            @foreach(config('system.paid') as $k => $v)
                                                <option value="{{ $k }}"
                                                        @if($booking->paid == $k) selected @endif>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            {{ trans('site.button_update') }}
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
        window.onload = function (e) {
            e.preventDefault();
            var price0 = $("#result1").val();
            var price1 = $("#result3").val();
            var price2 = $("#total_price2").val();
            var price3 = $("#result-before").val();

            $("#result4").val(numberToCurrency(price3));
            $("#result0").val(numberToCurrency(price0));
            $("#result2").val(numberToCurrency(price1));
            $("#total_price").val(numberToCurrency(price2));
        }

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
