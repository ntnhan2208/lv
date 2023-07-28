@extends('admin.master')
@section('content')
    <div class="row">
        <form class="container-fluid" action="{{ route('services.update',$service->id)}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <p class="text-uppercase font-14">{{ trans('site.main_content') }}</p>
                        <div class="tab-content detail-list pro-order-box" id="pills-tabContent">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ trans('site.service.name') }}</label>
                                    <div class="input-group">
                                        <input type="text" name="name"
                                               class="form-control name"
                                               value="{{$service->name}}" {{(in_array($service->id,[1,2])||$service->bookings()->exists()) ? "style=pointer-events:none" : ''}}>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.service.description') }}</label>
                                    <div class="input-group">
                                                    <textarea name="description"
                                                              class="form-control">{{$service->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.service.price') }}</label>
                                    <div class="input-group">
                                        <input type="text" name="price"
                                               class="form-control"
                                               value="{{$service->price}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Đơn vị tính</label>
                                    <select name="unit_price"
                                            class="custom-select custom-select-sm form-control form-control-sm" {{(in_array($service->id,[1,2])||$service->bookings()->exists()) ? "style=pointer-events:none" : ''}}>
                                        @foreach(config('system.unit_price') as $k => $v)
                                            @if(in_array($service->id,[1,2]))
                                                <option value="{{ $k }}" {{ $service->unit_price == $k ? 'selected':''}}>{{ $v }}</option>
                                            @endif
                                            @if($k>1)
                                            <option value="{{ $k }}" {{ $service->unit_price == $k ? 'selected':''}}>{{ $v }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.service.is_enabled') }}</label>
                                    <select name="is_enabled"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="0" {{ ($service->is_enabled == 0) ? 'selected' : '' }}>{{ trans('site.no') }}</option>
                                        <option value="1" {{ ($service->is_enabled == 1) ? 'selected' : '' }}>{{ trans('site.yes') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <button type="submit" class="btn btn-blue waves-effect waves-light px-4 mt-3 mb-3">
                            <i class="mdi mdi-check-all mr-2"></i>{{ trans('site.button_update')}}</button>
                        <a href="{{ route('services.index') }}">
                            <button type="button"
                                    class="btn btn-danger ml-2 px-4 mb-3 mt-3"><i class="fas fa-window-close"></i>
                                {{trans('site.reset') }}
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection