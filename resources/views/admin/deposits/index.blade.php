@extends('admin.master')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col-lg-4"><h4 class="page-title">Quản lý đặt cọc</h4></div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-8">
                            </div>
                            <div class="col-lg-4">
                                <div class="float-right">
                                    <a class="btn btn-primary"
                                       href="{{ route('deposits.create') }}">Tạo đặt cọc mới</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <ul class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active" href="#secondType" role="tab" data-toggle="tab">Cọc thuê nhà</a></li>
                <li><a class="nav-link " href="#firstType" role="tab" data-toggle="tab">Cọc giữ chỗ</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="secondType">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th data-priority="1">Khách đặt cọc</th>
                                            <th data-priority="1">Số điện thoại</th>
                                            <th data-priority="1">Ngày nhận cọc</th>
                                            <th data-priority="1">Ngày vào ở dự kiến</th>
                                            <th data-priority="1">Tiền cọc</th>
                                            <th data-priority="1">Phòng cọc</th>
                                            <th data-priority="1">Loại cọc</th>
                                            <th data-priority="1"></th>
                                            <th data-priority="1"></th>
                                            <th data-priority="1"></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($depositses as $deposits)
                                            @if($deposits->type==1)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $deposits->name }}
                                                </td>
                                                <td>
                                                    {{ $deposits->phone }}
                                                </td>
                                                <td>
                                                    {{ $deposits->date }}
                                                </td>
                                                <td>
                                                    {{ $deposits->date_start }}
                                                </td>
                                                <td>
                                                    {{ $deposits->price }}
                                                </td>
                                                <td>
                                                    {{ $deposits->room->name }}
                                                </td>
                                                <td>
                                                    {{ config('system.deposits')[$deposits->type] }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('add-booking-from-deposits', $deposits->id) }}">
                                                        <button type="button" class="btn btn-secondary ml-2 px-4 mb-3 mt-2"><i class="mdi mdi-plus-circle-outline mr-2"></i> Tạo hợp đồng mới
                                                        </button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form class="float-right"
                                                          action="{{ route('deposits.destroy',$deposits->id) }}"
                                                          method="POST"
                                                          onSubmit="if(!confirm('{{ trans('site.confirm') }}')) {return false;}">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-xs btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    <div class="float-right mr-3">
                                                        <a href="{{ route('deposits.edit', $deposits->id) }}"
                                                           class="btn btn-xs btn-primary"><i class="far fa-edit"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="firstType">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th data-priority="1">Khách đặt cọc</th>
                                            <th data-priority="1">Số điện thoại</th>
                                            <th data-priority="1">Ngày nhận cọc</th>
                                            <th data-priority="1">Ngày vào ở dự kiến</th>
                                            <th data-priority="1">Tiền cọc</th>
                                            <th data-priority="1">Phòng cọc</th>
                                            <th data-priority="1">Loại cọc</th>
                                            <th data-priority="1"></th>
                                            <th data-priority="1"></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($depositses as $deposits)
                                            @if($deposits->type==0)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        {{ $deposits->name }}
                                                    </td>
                                                    <td>
                                                        {{ $deposits->phone }}
                                                    </td>
                                                    <td>
                                                        {{ $deposits->date }}
                                                    </td>
                                                    <td>
                                                        {{ $deposits->date_start }}
                                                    </td>
                                                    <td>
                                                        {{ $deposits->price }}
                                                    </td>
                                                    <td>
                                                        {{ $deposits->room->name }}
                                                    </td>
                                                    <td>
                                                        {{ config('system.deposits')[$deposits->type] }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('add-booking-from-deposits', $deposits->id) }}">
                                                            <button type="button" class="btn btn-secondary ml-2 px-4 mb-3 mt-2"><i class="mdi mdi-plus-circle-outline mr-2"></i> Tạo hợp đồng mới
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form class="float-right"
                                                              action="{{ route('deposits.destroy',$deposits->id) }}"
                                                              method="POST"
                                                              onSubmit="if(!confirm('{{ trans('site.confirm') }}')) {return false;}">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-xs btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        <div class="float-right mr-3">
                                                            <a href="{{ route('deposits.edit', $deposits->id) }}"
                                                               class="btn btn-xs btn-primary"><i class="far fa-edit"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
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