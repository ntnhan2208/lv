@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="{{route('bill-create', $room->id)}}">{{ trans('site.add') }}</a>
                </div>
                <h4 class="page-title">Danh sách hóa đơn {{$room->name}}</h4>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th data-priority="1">Tháng</th>
                                    <th data-priority="1">Ngày lập hóa đơn</th>
                                    <th data-priority="1">Thời hạn thanh toán</th>
                                    <th data-priority="1">Tổng tiền</th>
                                    <th data-priority="1">Trạng thái</th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bills as $bill)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{\Carbon\Carbon::createFromFormat('Y-m-d', $bill->month )->year.'-'.\Carbon\Carbon::createFromFormat('Y-m-d', $bill->month )->month }}
                                        </td>
                                        <td>
                                            {{ $bill->date }}
                                        </td>
                                        <td>
                                            {{ $bill->deadline }}
                                        </td>
                                        <td>
                                            {{ $bill->total }}
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-{{ $bill->status == 1 ? 'success' : 'danger'}}">{{ config('system.paid')[$bill->status] }}</span>
                                        </td>
                                        <td>
                                            <div class="float-right mr-3">
                                                <a href="{{route('bill-edit', $bill->id)}}"
                                                   class="btn btn-xs btn-primary"><i class="far fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection