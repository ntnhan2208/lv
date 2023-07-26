@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h3>THANH LÝ HỢP ĐỒNG</h3>
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
                                           class="form-control integerInput"
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
                                           class="form-control integerInput" maxlength="10"
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
                                                   id="date_start" value="{{$booking->date_start}}"
                                                   style="pointer-events: none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ trans('site.booking.date_end') }} </label>
                                        <div class="input-group">
                                            <input class="form-control" type="date" name="date_end"
                                                   id="date_end" value="{{$booking->date_end}}"
                                                   style="pointer-events: none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="float-left"
                          action="{{route('room-confirm-checkout',$booking->id)}}"
                          method="POST"
                          onSubmit="if(!confirm('Xác nhận thanh lý hợp đồng'))
												  {return false;}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-xs btn-danger">Thanh lý hợp đồng</button>
                    </form>
                    @if($check == false)
                    <span class="ml-3" style="color: red; font-weight: bold; font-size: 20px;">Hợp đồng hiện chưa đến ngày kết thúc. Vui lòng thanh xác nhận trước khi thanh lý hợp đồng</span>
                    @endif

                </div>
            </div>
@endsection



