@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <label>DANH SÁCH CĂN HỘ ĐANG CHO THUÊ</label>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <hr>
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th data-priority="1" class="text-center"></th>
                                    <th data-priority="1">Loại căn hộ</th>
                                    <th data-priority="1">Căn hộ</th>
                                    <th data-priority="1">{{ trans('site.booking.name') }}</th>
                                    <th data-priority="1">{{ trans('site.booking.phone') }}</th>
                                    <th data-priority="6">Ngày ký hợp đồng</th>
                                    <th data-priority="6">Ngày kết thúc hợp đồng</th>
                                    <th data-priority="1">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $booking->room->type->name }}</td>
                                        <td>{{ $booking->room->name }}</td>
                                        <td>{{ $booking->customer->name }}</td>
                                        <td>{{ $booking->customer->phone }}</td>
                                        <td>{{ $booking->date_start }}</td>
                                        <td>{{ $booking->date_end }}</td>
                                        <td class="text-right">
                                            <div class="float-right">
                                                <a class="btn btn-xs btn-primary mr-3"
                                                   href="{{ route('customer-booked', $booking->room->id) }}">
                                                    <i class="ti-user mr-2"></i>Nhân khẩu
                                                </a>
                                                <a class="btn btn-xs btn-warning mr-3"
                                                   href="{{ route('bill-index',$booking->room->id) }}">
                                                    <i class="ti-pencil-alt mr-2"></i>Hóa đơn
                                                </a>
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
        @endsection
        @section('scripts')
            <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
                  integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
                  crossorigin="anonymous">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
                    integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
                    crossorigin="anonymous"></script>

@endsection


