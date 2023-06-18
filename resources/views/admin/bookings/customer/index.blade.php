@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                @if($room->amount != count($customers))
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('customers.create','room='.$room->id) }}">{{ trans('site.add') }}</a>
                    </div>
                @endif
                <h4 class="page-title">Danh sách khách thuê căn
                    hộ {{$room->name .' ('.count($customers).'/'.$room->amount.')'}}</h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th data-priority="1" class="text-center"></th>
                                    <th data-priority="1">{{ trans('site.customer.name') }}</th>
                                    <th data-priority="1">{{ trans('site.customer.phone') }}</th>
                                    <th data-priority="1">{{ trans('site.customer.personal_id') }}</th>
                                    <th data-priority="1">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->personal_id}}</td>
                                        <td class="text-right">
                                            <form class="float-right"
                                                  action="{{route('customers.destroy',$customer->id)}}"
                                                  method="POST" onSubmit="if(!confirm('{{ trans('site.admin.confirm') }}'))
												  {return false;}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-xs btn-danger"><i class="fas
												fa-trash"></i></button>
                                            </form>
                                            <div class="float-right">
                                                <a class="btn btn-xs btn-primary mr-3"
                                                   href="{{ route('customers.edit',$customer->id) }}">
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
