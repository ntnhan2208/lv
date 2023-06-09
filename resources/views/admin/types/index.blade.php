@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="{{ route('types.create') }}">{{ trans('site.add') }}</a>
                </div>
                <h4 class="page-title">{{trans('site.type.title')}}</h4>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th data-priority="1">{{trans('site.type.name')}}</th>
                                    <th data-priority="1">{{trans('site.type.description')}}</th>
                                    <th data-priority="1">{{trans('site.type.updated_by')}}</th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($types as $type)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{$type->name}}
                                        </td>
                                        <td>
                                            {{ $type->description}}
                                        </td>
                                        <td>
                                            {{\Illuminate\Support\Facades\Auth::user()->find($type->admin_id)->name}}
                                        </td>
                                        <td>
                                            <form class="float-right"
                                                  action="{{ route('types.destroy',$type->id) }}"
                                                  method="POST"
                                                  onSubmit="if(!confirm('{{ trans('site.confirm') }}')) {return false;}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <div class="float-right mr-3">
                                                <a href="{{ route('types.edit', $type->id) }}"
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