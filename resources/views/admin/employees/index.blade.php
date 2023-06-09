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
