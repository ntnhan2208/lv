@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col-lg-4"><h4 class="page-title">Quản lý hợp đồng</h4></div>
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
                                       href="{{ route('bookings.create') }}">Tạo hợp đồng mới</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
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
                                                <th data-priority="1">Loại Căn hộ</th>
                                                <th data-priority="1">Căn hộ</th>
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
                                                    <td>{{ $booking->room->type->name }}</td>
                                                    <td>{{ $booking->room->name }}</td>
                                                    <td>{{ $booking->customer->name }}</td>
                                                    <td>{{ $booking->customer->phone }}</td>
                                                    <td>{{ $booking->date_start }}</td>
                                                    <td>{{ $booking->date_end }}</td>
                                                    <td>
                                                        <span class="badge badge-soft-{{ $booking->paid==1 ? 'success' : 'danger' }}">{{ config('system.paid.'.$booking->paid) }}</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <form class="float-right"
                                                              action="{{route('bookings.destroy',$booking->id)}}"
                                                              method="POST"
                                                              onSubmit="if(!confirm('{{ trans('site.admin.confirm') }}'))
												  {return false;}">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-xs btn-danger"><i
                                                                        class="fas
												fa-trash"></i></button>
                                                        </form>
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


