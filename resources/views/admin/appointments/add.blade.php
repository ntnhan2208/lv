@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="{{ route('appointments.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="name"
                                               class="form-control"
                                               placeholder="{{ trans('site.customer.name') }}"
                                               value="{{old('name')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="phone"
                                               class="form-control"
                                               placeholder="Số điện thoại"
                                               value="{{old('phone')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="total-price">
                            <div id="book-room">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Ngày hẹn</label>
                                            <div class="input-group">
                                                <input class="form-control" type="date" name="date"
                                                       id="date_start" value="{{old('date_start')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Căn hộ xem</label>
                                            <select class="custom-select custom-select-sm form-control form-control-sm"
                                                    id="price" name="room_id">
                                                @foreach($rooms as $room)
                                                    <option value="{{$room->id}}"
                                                            data-price="{{$room->price}}" {{old('room_id') == $room->id ? 'selected':''}}>{{$room->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nhân viên môi giới</label>
                                            <select class="custom-select custom-select-sm form-control form-control-sm"
                                                    name="employee_id">
                                                @foreach($employees as $employee)
                                                    <option value="{{$employee->id}}"
                                                           {{old('employee_id') == $employee->id ? 'selected':''}}>{{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            Đặt lịch hẹn
                        </button>
                        <a href="{{ route('appointments.index') }}">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> {{trans('site.reset') }} </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

