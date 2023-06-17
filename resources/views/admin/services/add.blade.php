@extends('admin.master')
@section('content')
    <div class="row">
        <form class="container-fluid" action="{{ route('services.store')}}" method="POST"
              enctype="multipart/form-data">
            @csrf
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
                                               placeholder="{{ trans('site.service.name') }}"
                                               value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.service.description') }}</label>
                                    <div class="input-group">
                                                    <textarea name="description"
                                                              class="form-control"
                                                              placeholder="{{ trans('site.service.description') }}">{{old('description')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.service.price') }}</label>
                                    <div class="input-group">
                                        <input type="text" name="price"
                                               class="form-control"
                                               placeholder="{{ trans('site.service.price') }}"
                                               value="{{old('price')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Đơn giá</label>
                                    <select name="unit_price"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        @foreach(config('system.unit_price') as $k => $v)
                                        <option value="{{ $k }}" {{ old('unit_price') == $k ? 'selected':''}}>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.service.is_enabled') }}</label>
                                    <select name="is_enabled"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        @foreach(config('system.is_enabled') as $k => $v)
                                        <option value="{{ $k }}" {{ old('is_enabled') == $k ? 'selected':''}}>{{ $v }}</option>
                                        @endforeach
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
                        <button type="submit" class="btn btn-blue ml-2 px-4 mt-3 mb-3">
                            <i class="mdi mdi-check-all mr-2"></i>{{ trans('site.button_add')}}</button>
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
