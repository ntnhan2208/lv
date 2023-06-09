@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col-lg-4"><h4 class="page-title">{{ trans('site.booking.title') }}</h4></div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-8">
{{--                                <form action="{{route('check')}}" method="POST" enctype="multipart/form-data">--}}
{{--                                    @method('GET')--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-8"><input class="form-control" type="text" name="check_phone"--}}
{{--                                                                     placeholder="Nhập SĐT để kiểm tra khách hàng đã cọc">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-4">--}}
{{--                                            <button class="btn btn-warning waves-effect waves-light" type="submit">Kiểm--}}
{{--                                                tra--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
                            </div>
                            <div class="col-lg-4">
                                <div class="float-right">
                                    <a class="btn btn-primary"
                                       href="{{ route('bookings.create') }}">{{ trans('site.book') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a class="nav-link active" href="#booked" role="tab" data-toggle="tab">Quản lý hợp đồng</a>
                        </li>
{{--                        <li><a class="nav-link" href="#paid" role="tab" data-toggle="tab">Quản lý danh sách cọc</a>--}}
{{--                        </li>--}}
                        <li><a class="nav-link" href="#booking" role="tab" data-toggle="tab">Quản lý thuê phòng</a></li>
                    </ul>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="booked">
                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <label>DANH SÁCH HỢP ĐỒNG</label>
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <hr>
                                        <table id="tech-companies-1" class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th data-priority="1" class="text-center"></th>
                                                <th data-priority="1">Phòng</th>
                                                <th data-priority="1">{{ trans('site.booking.name') }}</th>
                                                <th data-priority="1">{{ trans('site.booking.phone') }}</th>
                                                <th data-priority="6">Ngày ký hợp đồng</th>
                                                <th data-priority="6">Ngày kết thúc hợp đồng</th>
                                                <th data-priority="6">{{ trans('site.booking.paid') }}</th>
                                                <th data-priority="1">

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($bookings as $booking)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $booking->room->name }}</td>
                                                    <td>{{ $booking->customer->name }}</td>
                                                    <td>{{ $booking->customer->phone }}</td>
                                                    <td>{{ $booking->date_start }}</td>
                                                    <td>{{ $booking->date_end }}</td>
                                                    <td>
                                                        <span class="badge badge-soft-{{ $booking->paid==1 ? 'success' : 'danger' }}">{{ config('system.paid.'.$booking->paid) }}</span>
                                                    </td>
                                                    <td class="text-right">
{{--                                                        <form class="float-right"--}}
{{--                                                              action="{{route('bookings.destroy',$booking->id)}}"--}}
{{--                                                              method="POST"--}}
{{--                                                              onSubmit="if(!confirm('{{ trans('site.admin.confirm') }}'))--}}
{{--												  {return false;}">--}}
{{--                                                            {{ method_field('DELETE') }}--}}
{{--                                                            {{ csrf_field() }}--}}
{{--                                                            <button type="submit" class="btn btn-xs btn-danger"><i--}}
{{--                                                                        class="fas--}}
{{--												fa-trash"></i></button>--}}
{{--                                                        </form>--}}
                                                        <div class="float-right">
                                                            <a class="btn btn-xs btn-primary mr-3"
                                                               href="{{ route('bookings.edit',$booking->id) }}">
                                                                <i class="far fa-edit"></i>
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
                </div>
{{--                <div class="tab-pane" id="paid">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="card mt-3">--}}
{{--                            <div class="card-body">--}}
{{--                                <label>DANH SÁCH HỢP ĐỒNG</label>--}}
{{--                                <div class="table-rep-plugin">--}}
{{--                                    <div class="table-responsive mb-0" data-pattern="priority-columns">--}}
{{--                                        <hr>--}}
{{--                                        <table id="tech-companies-1" class="table table-striped mb-0">--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}
{{--                                                <th data-priority="1" class="text-center"></th>--}}
{{--                                                <th data-priority="1">Phòng</th>--}}
{{--                                                <th data-priority="1">{{ trans('site.booking.name') }}</th>--}}
{{--                                                <th data-priority="1">{{ trans('site.booking.phone') }}</th>--}}
{{--                                                <th data-priority="6">{{ trans('site.booking.date_start') }}</th>--}}
{{--                                                <th data-priority="6">{{ trans('site.booking.date_end') }}</th>--}}
{{--                                                <th data-priority="6">{{ trans('site.booking.total') }}</th>--}}
{{--                                                <th data-priority="6">{{ trans('site.booking.paid') }}</th>--}}
{{--                                                <th data-priority="1">--}}

{{--                                                </th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                            @foreach($bookings_paid as $booking_paid)--}}
{{--                                                <tr>--}}
{{--                                                    <td class="text-center">{{ $loop->iteration }}</td>--}}
{{--                                                    <td>{{ $booking_paid->room->name }}</td>--}}
{{--                                                    <td>{{ $booking_paid->customer->name }}</td>--}}
{{--                                                    <td>{{ $booking_paid->customer->phone }}</td>--}}
{{--                                                    <td>{{ $booking_paid->date_start }}</td>--}}
{{--                                                    <td>{{ $booking_paid->date_end }}</td>--}}
{{--                                                    <td>{{ $booking_paid->total_price }}</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge badge-soft-{{ $booking_paid->paid==1 ? 'success' : 'danger' }}">{{ config('system.paid.'.$booking_paid->paid) }}</span>--}}
{{--                                                    </td>--}}

{{--                                                    <td class="text-right">--}}
{{--                                                        <form class="float-right"--}}
{{--                                                              action="{{route('bookings.destroy',$booking_paid->id)}}"--}}
{{--                                                              method="POST"--}}
{{--                                                              onSubmit="if(!confirm('{{ trans('site.admin.confirm') }}'))--}}
{{--												  {return false;}">--}}
{{--                                                            {{ method_field('DELETE') }}--}}
{{--                                                            {{ csrf_field() }}--}}
{{--                                                            <button type="submit" class="btn btn-xs btn-danger"><i--}}
{{--                                                                        class="fas--}}
{{--												fa-trash"></i></button>--}}
{{--                                                        </form>--}}

{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="tab-pane" id="booking">
                    <div class="col-lg-12">
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
                                                <th data-priority="1">Phòng</th>
                                                <th data-priority="1">{{ trans('site.booking.name') }}</th>
                                                <th data-priority="1">{{ trans('site.booking.phone') }}</th>
                                                <th data-priority="1">

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($bookings as $booking)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $booking->room->name }}</td>
                                                    <td>{{ $booking->customer->name }}</td>
                                                    <td>{{ $booking->customer->phone }}</td>
                                                    <td class="text-right">
                                                        <div class="float-right">
                                                            <a class="btn btn-xs btn-primary mr-3"
                                                               href="#">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                        </div>
{{--                                                        <form class="float-right"--}}
{{--                                                              action="{{route('bookings.destroy',$booking->id)}}"--}}
{{--                                                              method="POST"--}}
{{--                                                              onSubmit="if(!confirm('{{ trans('site.admin.confirm') }}'))--}}
{{--												  {return false;}">--}}
{{--                                                            {{ method_field('DELETE') }}--}}
{{--                                                            {{ csrf_field() }}--}}
{{--                                                            <button type="submit" class="btn btn-xs btn-danger"><i--}}
{{--                                                                        class="fas--}}
{{--												fa-trash"></i></button>--}}
{{--                                                        </form>--}}

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


