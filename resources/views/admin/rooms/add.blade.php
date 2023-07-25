@extends('admin.master')
@section('content')
    <div class="row">
        <form class="container-fluid" action="{{ route('rooms.store')}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <p class="text-uppercase font-14">{{ trans('site.main_content') }}</p>
                        <div class="tab-content detail-list pro-order-box" id="pills-tabContent">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{trans('site.room.name')}}</label>
                                    <div class="input-group">
                                        <input type="text" name="name"
                                               class="form-control name"
                                               placeholder="{{trans('site.room.name')}}"
                                               value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.room.amount')}}</label>
                                    <input type="text" name="amount"
                                           class="form-control integerInput"
                                           placeholder="{{trans('site.room.amount')}}"
                                           value="{{old('amount')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.room.acreage')}}</label>
                                    <input type="text" name="acreage"
                                           class="form-control integerInput"
                                           placeholder="{{trans('site.room.acreage')}}"
                                           value="{{old('acreage')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.room.price')}}</label>
                                    <div class="input-group">
                                        <input type="text" name="price"
                                               class="form-control integerInput"
                                               placeholder="{{trans('site.room.price')}}"
                                               value="{{old('price')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.room.description')}}</label>
                                    <div class="input-group">
                                                    <textarea name="description"
                                                              class="form-control"
                                                              placeholder="{{trans('site.room.description')}}">{{old('description')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.room.type')}}</label>
                                    <select class="form-control" name="type_id" id="types">
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected':''}}>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.room.is_enabled') }}</label>
                                    <select name="is_enabled"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        @foreach(config('system.is_enabled') as $k => $v)
                                        <option value="{{$k}}" {{old('is_enabled') == $k ? 'selected':''}}>{{ $v }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.room.image') }}</label>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="image"
                                                       id="image" readonly hidden/>
                                                <button type="button" data-avatar="image"
                                                        class="btn btn-blue btn-square waves-effect waves-light px-4 mt-3 mb-3 get_image">
                                                    {{ trans('site.button_choose')}}
                                                </button>
                                                <button type="button" data-avatar="image"
                                                        disabled='disabled'
                                                        class="btn btn-danger btn-square waves-effect waves-light px-4 mt-3 mb-3 ml-3 remove_image">
                                                    {{ trans('site.button_remove')}}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img id="image_avatar"
                                                 src="{{asset('admin/assets/images/no_img.jpg')}}"
                                                 class="img-thumbnail"/>
                                        </div>
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
                            <i class="mdi mdi-check-all mr-2"></i>{{ trans('site.button_add')}}</button>
                        <a href="{{ route('rooms.index') }}">
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
