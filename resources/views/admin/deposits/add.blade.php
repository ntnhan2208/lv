@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="{{ route('deposits.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
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
                            <div class="col-lg-4">
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Căn hộ cọc</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm" id="room"
                                            name="room_id" style="" onChange="update()">
                                        @foreach($rooms as $room)
                                            <option value="{{$room->id}}"
                                                    data-price="{{$room->price}}" {{old('room_id') == $room->id ? 'selected':''}}>{{$room->name}}</option>
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
                                               id="date_start" value="{{old('date_start')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày dự kiến vào ở</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="date_start"
                                               id="date_start" value="{{old('date_start')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <div class="input-group">
                                 <textarea name="note"
                                           class="form-control"
                                           placeholder="Ghi chú">{{ old('note') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Loại cọc</label>
                                    <select class="custom-select custom-select-sm form-control form-control-sm"
                                            name="type">
                                        @foreach(config('system.deposits') as $k=>$v)
                                            <option value="{{$k}}">{{$v}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Số tiền cần đặt cọc của Căn hộ</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="total" id="total"
                                              value="" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Số tiền cọc</label>
                                    <div class="input-group">
                                        <input class="form-control integerInput" type="text" name="price"
                                              value="{{old('price')}}">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            Đặt cọc
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
        function update() {
            var select = document.getElementById('room');
            var option = select.options[select.selectedIndex];
            document.getElementById('total').value = option.getAttribute('data-price');
        }
        update();
    </script>
@endsection

