@extends('admin.master')
@section('content')
    <div class="row">
        <form class="container-fluid" action="{{ route('types.update',$type->id)}}" method="POST"
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
                                    <label>{{ trans('site.type.name') }}</label>
                                    <div class="input-group">
                                        <input type="text" name="name"
                                               class="form-control name"
                                               value="{{$type->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.type.description') }}</label>
                                    <div class="input-group">
                                                    <textarea name="description"
                                                              class="form-control">{{$type->description}}</textarea>
                                    </div>
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
                        <a href="{{ route('types.index') }}">
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