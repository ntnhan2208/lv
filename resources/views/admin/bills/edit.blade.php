@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <h3>Hóa đơn tháng  {{\Carbon\Carbon::createFromFormat('Y-m-d', $bill->month )->month.'-'.\Carbon\Carbon::createFromFormat('Y-m-d', $bill->month )->year }}</h3>
                    <form action="{{route('bill-update', $bill->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày lập hóa đơn</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="date"
                                               id="date_start" value="{{$bill->date}}" style="pointer-events: none">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Thời gian đóng tiền</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="deadline"
                                               id="date_start" value="{{$bill->deadline}}" style="pointer-events: none">
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
                                                               value="{{$bill->old_electric}}"  readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Số điện mới</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="new_electric" name="new_electric"
                                                               value="{{$bill->new_electric}}" readonly>
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
                                                               value="{{$bill->electric}}" hidden readonly>
                                                        <input class="form-control" type="text" id="electric-price"
                                                               value="3500" hidden readonly>
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
                                                        <input class="form-control" type="text" id="old_water" value="{{$bill->old_water}}" name="old_water" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Số nước mới</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" value="{{$bill->new_water}}" id="new_water" name="new_water" readonly>
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
                                                               value="{{$bill->water}}" hidden readonly>
                                                        <input class="form-control" type="text" id="water-price"
                                                               value="3500" hidden readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @if($bill->service)
                            <div class="col-lg-4">
                                <label style="font-weight: bold;">DỊCH VỤ KHÁC</label>
                                @foreach($bill->service as $key => $service)
                                @php
                                $name = \App\Models\Service::where('id', $key)->first()->name;
                                @endphp
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>{{$name}}</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text"
                                                              value="{{array_key_first($service)}}"  readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Thành tiền</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="price-{{$key}}"
                                                               value={{$service[array_key_first($service)]}} readonly>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Tiền thuê căn hộ</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="total_room" readonly>
                                        <input class="form-control" type="text" id="total_room_input" name="total_room"
                                               value="{{$bill->total_room}}" hidden readonly>
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
                                               value="{{$bill->total_service}}" hidden readonly>
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
                                               value="{{$bill->total}}" hidden readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{ trans('site.booking.paid') }} </label>
                                    <div class="input-group">
                                        <select name="status"
                                                class="custom-select custom-select-sm form-control form-control-sm" {{$bill->status == 1 ? "style=pointer-events:none":''}}>
                                            @foreach(config('system.paid') as $k => $v)
                                                <option value="{{ $k }}" {{ $bill->status == $k ? 'selected':'' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            Cập nhật
                        </button>
                        <a href="{{ route('room-booked') }}">
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

            var water = $("#water-input").val();
            $("#water").val(numberToCurrency(water));

            var electric = $("#electric-input").val();
            $("#electric").val(numberToCurrency(electric));

            var service = $("#total_service_input").val();
            $("#total_service").val(numberToCurrency(service));

            var total = $("#total-input").val();
            $("#total").val(numberToCurrency(total));

        }

        function currencyToNumber(currency) {
            return Number(currency.replace(/[^0-9\.]+/g, ""));
        }

        function numberToCurrency(number) {
            return new Intl.NumberFormat().format(number);
        }

    </script>
@endsection
