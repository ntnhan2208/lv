@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="{{ route('appointments.update', $appointment->id)}}" method="POST"
                          enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="name"
                                               class="form-control"
                                               placeholder="{{ trans('site.customer.name') }}"
                                               value="{{$appointment->name}}" {{(in_array($appointment->status,[1,2,3,4]) || \Illuminate\Support\Facades\Auth::user()->role==1 )? "style=pointer-events:none" : ''}}>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="phone"
                                               class="form-control integerInput" maxlength="10"
                                               placeholder="Số điện thoại"
                                               value="{{$appointment->phone}}" {{(in_array($appointment->status,[1,2,3,4]) || \Illuminate\Support\Facades\Auth::user()->role==1)? "style=pointer-events:none" : ''}}>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày hẹn</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="date"
                                               id="date_start" value="{{$appointment->date}}" {{(in_array($appointment->status,[1,2,3,4]) || \Illuminate\Support\Facades\Auth::user()->role==1)? "style=pointer-events:none" : ''}}>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Căn hộ xem</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm"
                                            id="price" name="room_id" {{(in_array($appointment->status,[1,2,3,4]) || \Illuminate\Support\Facades\Auth::user()->role==1)? "style=pointer-events:none" : ''}}>
                                        @foreach($rooms as $room)
                                            <option value="{{$room->id}}"
                                                    {{$room->id == $appointment->room_id ? 'selected':''}}>{{$room->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nhân viên môi giới</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm"
                                            id="price" name="employee_id" {{(in_array($appointment->status,[1,2,3,4]) || \Illuminate\Support\Facades\Auth::user()->role==1)? "style=pointer-events:none" : ''}}>
                                        @foreach($employees as $employee)
                                            <option value="{{$employee->id}}"
                                                    {{$employee->id == $appointment->employee_id ? 'selected':''}}>{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm"
                                            name="status" {{in_array($appointment->status,[1,2,3,4]) ? "style=pointer-events:none" : ''}}>
                                        @if(in_array($appointment->status,[1,2,3,4]))
                                            @foreach(config('system.appointment') as $k=>$v)
                                                @if(in_array($k,[1,2,3,4]))
                                                    <option value="{{$k}}"
                                                            {{$k == $appointment->status ? 'selected':''}} readonly>{{$v}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach(config('system.appointment') as $k=>$v)
                                                @if(in_array($k,[0,1,4]))
                                                    <option value="{{$k}}"
                                                            {{$k == $appointment->status ? 'selected':''}} {{$k < $appointment->status ? 'disabled':''}}>{{$v}}</option>
                                                @endif

                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            {{--                            <div class="col-8">--}}
                            {{--                                <div class="form-group"></div>--}}
                            {{--                                <a href="{{ route('add-deposits', $appointment->id) }}">--}}
                            {{--                                    <button type="button" class="btn btn-primary ml-2 px-4 mb-3 mt-2"><i class="mdi mdi-plus-circle-outline mr-2"></i> Đặt cọc--}}
                            {{--                                    </button>--}}
                            {{--                                </a><a href="{{ route('bookings.create') }}">--}}
                            {{--                                    <button type="button" class="btn btn-secondary ml-2 px-4 mb-3 mt-2"><i class="mdi mdi-plus-circle-outline mr-2"></i> Tạo hợp đồng mới--}}
                            {{--                                    </button>--}}
                            {{--                                </a>--}}
                            {{--                            </div>--}}
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            Cập nhật
                        </button>
                        <a href="{{ route('appointments.index') }}">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> Trở về
                            </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
