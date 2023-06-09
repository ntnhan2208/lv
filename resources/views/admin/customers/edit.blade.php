@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="{{ route('customers.update',$customer->id)}}" method="POST"
                          enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('site.customer.name') }} </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="name" class="form-control"
                                       value="{{$customer->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('site.customer.phone') }} </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="phone" class="form-control"
                                       value="{{$customer->phone}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('site.customer.email') }} </label>
                            <div class="input-group">
                                <input type="email" id="example-input1-group1" name="email" class="form-control"
                                       value="{{$customer->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('site.customer.personal_id') }} </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="personal_id" class="form-control"
                                       value="{{$customer->personal_id}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            {{ trans('site.button_update') }}
                        </button>
                        <a href="{{ route('customers.index') }}">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> {{trans('site.reset') }} </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <label>LỊCH SỬ THANH TOÁN</label>
{{--                    <table id="tech-companies-1" class="table table-striped mb-0">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th data-priority="1" class="text-center"></th>--}}
{{--                            <th data-priority="1">Tháng</th>--}}
{{--                            <th data-priority="1">Ngày trả</th>--}}
{{--                            <th data-priority="1">Tổng giá</th>--}}
{{--                            <th data-priority="1">Trạng thái thanh toán</th>--}}
{{--                            <th data-priority="1">--}}
{{--                            </th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @forelse($bookings as $booking)--}}
{{--                            <tr>--}}
{{--                                <td class="text-center">{{ $loop->iteration }}</td>--}}
{{--                                <td>{{ $booking->date_start }}</td>--}}
{{--                                <td>{{ $booking->date_end }}</td>--}}
{{--                                <td>{{ $booking->total_price}}</td>--}}
{{--                                <td>--}}
{{--                                    <span class="badge badge-soft-{{ $booking->paid==1 ? 'success' : 'danger' }}">{{ config('system.paid.'.$booking->paid) }}</span>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @empty--}}
{{--                            <span class="badge badge-soft-danger">Chưa có đơn đặt hàng!</span>--}}
{{--                        @endforelse--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

