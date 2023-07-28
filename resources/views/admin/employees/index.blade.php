@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('employees.create') }}">{{ trans('site.add') }}</a>
                </div>
                <h4 class="page-title">{{ trans('site.employee.title') }}</h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <form action="" class="form-inline">
                                <div class="form-group">
                                    <input class="form-control" name="key" placeholder="Search...">
                                </div>
                                <button type="submit" class="btn btn-danger mr-3">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a type="button" class="btn btn-primary" href="{{route('employees.index')}}">
                                    <i class="ti-reload"></i>
                                </a>
                            </form>
                            <hr>
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th data-priority="1" class="text-center"></th>
                                    <th data-priority="1">{{ trans('site.employee.name') }}</th>
                                    <th data-priority="1">{{ trans('site.employee.phone') }}</th>
                                    <th data-priority="1">{{ trans('site.employee.personal_id') }}</th>
                                    <th data-priority="1">Phần trăm hoa hồng</th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $employee->name }}
                                        </td>
                                        <td>
                                            {{ $employee->phone }}
                                        </td>
                                        <td>
                                            {{ $employee->personal_id }}
                                        </td>
                                        <td>
                                            {{ $employee->commission .'%' }}
                                        </td>
                                        <td class="text-right">
                                            <form class="float-right"
                                                  action="{{route('employees.destroy',$employee->id)}}"
                                                  method="POST" onSubmit="if(!confirm('{{ trans('site.admin.confirm') }}'))
												  {return false;}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-xs btn-danger"><i class="fas
												fa-trash"></i></button>
                                            </form>
                                            <div class="float-right">
                                                <a class="btn btn-xs btn-primary mr-3"
                                                   href="{{ route('employees.edit',$employee->id) }}">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="float-right">
                                                <!-- Button trigger modal -->
                                                <button class="btn btn-xs btn-primary mr-3" style="color: white"
                                                        onclick="show({{$employee->id}})">
                                                    Chi tiết tiền hoa hồng
                                                </button>
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

    @foreach($employees as $employee)
        <div class="modal fade" id="myModal-{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document" >
                <div class="modal-content" style="border-radius: 5px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chi tiết tiền hoa hồng {{$employee->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="tech-companies-1" class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th data-priority="1" class="text-center"></th>
                                <th data-priority="1">Thời gian</th>
                                <th data-priority="1">Căn hộ</th>
                                <th data-priority="1">Hoa hồng</th>
                                <th data-priority="1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employee->employeesCommissions()->get() as $value)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        {{ \App\Models\Room::find($value->room_id)->name }}
                                    </td>
                                    <td>
                                        @money($value->commission)
                                    </td>
                                    <td>
                                        @csrf
                                        <div class="checkbox checkbox-success checkbox-circle">
                                            <input id="checkbox-{{$value->id}}" type="checkbox" {{$value->status == 1 ? 'checked disabled' : ''}}  onclick="if(!confirm('Xác nhận thay đổi trạng thái thanh toán'))
												  {return false;} else status({{$value->id}})">
                                            <label for="checkbox-{{$value->id}}">
                                                Đã thanh toán
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    <script>
        function show(id){
            $('#myModal-'+id).modal('show');
        }
        function status(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                data: {
                    id: id,
                },
                url: '/admin/employees-changes-status-commission',
                success: function (data) {
                    $('#checkbox-'+id).attr('disabled','disabled');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                },
            });
        }
    </script>
@endsection