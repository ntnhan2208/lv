@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="{{ route('services.create') }}">{{ trans('site.add') }}</a>
                </div>
                <h4 class="page-title">{{ trans('site.service.title') }}</h4>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th data-priority="1">{{ trans('site.service.name') }}</th>
                                    <th data-priority="1">{{ trans('site.service.price') }}</th>
                                    <th data-priority="1">{{ trans('site.service.is_enabled') }}</th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $service->name }}
                                        </td>
                                        <td>
                                            {{ $service->price .'/'.config('system.unit_price')[$service->unit_price]}}
                                        </td>
                                        <td>
                                            @if($service->is_enabled )
                                                <div class="custom-control custom-switch switch-primary">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchStatusSwitchStatus{{ $service->id }}"
                                                           checked>
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus{{ $service->id }}"></label>
                                                </div>
                                            @else
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchcustomSwitchStatus{{ $service->id }}">
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus{{ $service->id }}"></label>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <form class="float-right"
                                                  action="{{ route('services.destroy',$service->id) }}"
                                                  method="POST"
                                                  onSubmit="if(!confirm('{{ trans('site.confirm') }}')) {return false;}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <div class="float-right mr-3">
                                                <a href="{{ route('services.edit', $service->id) }}"
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