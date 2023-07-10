@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="{{ route('deposits.update', $deposits->id)}}" method="POST" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="name"
                                               class="form-control"
                                               placeholder="{{ trans('site.customer.name') }}"
                                               value="{{$deposits->name}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="phone"
                                               class="form-control"
                                               placeholder="Số điện thoại"
                                               value="{{$deposits->phone}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Căn hộ cọc</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm"
                                            name="room_id" style="pointer-events: none">
                                        @foreach($rooms as $room)
                                            <option value="{{$room->id}}"
                                                    {{$deposits->room_id == $room->id ? 'selected':''}}>{{$room->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày nhận cọc</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="date"
                                               id="date_start" value="{{$deposits->date}}" style="pointer-events: none">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày dự kiến vào ở</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="date_start"
                                               id="date_start" value="{{$deposits->date_start}}" style="pointer-events: none">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <div class="input-group">
                                 <textarea name="note"
                                           class="form-control"
                                           placeholder="Ghi chú">{{$deposits->note}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Loại cọc</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm"
                                            name="type" style="pointer-events: none">
                                        @foreach(config('system.deposits') as $k=>$v)
                                            <option value="{{$k}}">{{$v}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Số tiền cọc</label>
                                    <div class="input-group">
                                        <input class="form-control integerInput" type="text" name="price"
                                               value="{{$deposits->price}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('deposits.index') }}">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> Quay về</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
