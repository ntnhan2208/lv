@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                @if(\Illuminate\Support\Facades\Auth::user()->role == null)
                    <div class="float-right">
                        <a class="btn btn-primary float-right"
                           href="{{ route('appointments.create') }}">{{ trans('site.add') }}</a>
                    </div>
                @endif
                <h4 class="page-title">Quản lý lịch hẹn</h4>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th data-priority="1">Khách hẹn</th>
                                    <th data-priority="1">Số điện thoại</th>
                                    <th data-priority="1">Loại Căn hộ</th>
                                    <th data-priority="1">Căn hộ</th>
                                    <th data-priority="1">Ngày</th>
                                    <th data-priority="1">Nhân viên môi giới</th>
                                    <th data-priority="1"></th>
                                    <th data-priority="1"></th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $appointment->name }}
                                        </td>
                                        <td>
                                            {{ $appointment->phone }}
                                        </td>
                                        <td>
                                            {{ $appointment->room->type->name }}
                                        </td>
                                        <td>
                                            {{ $appointment->room->name }}
                                        </td>
                                        <td>
                                            {{ $appointment->date }}
                                        </td>
                                        <td>
                                            {{ $appointment->employee->name }}
                                        </td>
                                        <td>

                                            <span class="badge badge-soft-{{ $appointment->status == 2 ? 'success' : ($appointment->status == 3  ? 'secondary' : (in_array($appointment->status, [0,1]) ? 'warning' :'danger'))}}">{{ config('system.appointment')[$appointment->status] }}</span>
                                        </td>
                                        <td>
                                            @if(!in_array($appointment->status,[2,3,4]))
                                                @if(\Illuminate\Support\Facades\Auth::user()->role == null)
                                                    <a href="{{ route('add-bookings', $appointment->id) }}">
                                                        <button type="button" class="btn btn-secondary ml-2 px-4 mb-3 mt-2">
                                                            <i class="mdi mdi-plus-circle-outline mr-2"></i> Tạo hợp đồng
                                                            mới
                                                        </button>
                                                    </a>
                                                @endif

                                                <a href="{{ route('add-deposits', $appointment->id) }}">
                                                    <button type="button" class="btn btn-primary ml-2 px-4 mb-3 mt-2"><i
                                                                class="mdi mdi-plus-circle-outline mr-2"></i> Đặt cọc
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="float-right mr-3">
                                                <a href="{{ route('appointments.edit', $appointment->id) }}"
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