@extends('admin.master')
@section('content')
    <div class="row">
        <form class="container-fluid" action="{{ route('rooms.update',$room->id)}}" method="POST"
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
                                    <label>{{trans('site.room.name')}}</label>
                                    <div class="input-group">
                                        <input type="text" name="name"
                                               class="form-control name"
                                               value="{{$room->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.room.amount')}}</label>
                                    <input type="text" name="amount"
                                           class="form-control"
                                           value="{{$room->amount}}">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.room.acreage')}}</label>
                                    <input type="text" name="acreage"
                                           class="form-control"
                                           value="{{$room->acreage}}">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.room.price')}}</label>
                                    <div class="input-group">
                                        <input type="text" name="price"
                                               class="form-control"
                                               value="{{$room->price}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.room.description')}}</label>
                                    <div class="input-group">
                                                    <textarea name="description"
                                                              class="form-control">{{$room->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.room.type')}}</label>
                                    <select class="form-control" name="type_id" id="types">
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}"
                                                    @if($type->rooms->contains($room->id)))
                                                    selected @endif>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.service.is_enabled') }}</label>
                                    <select name="is_enabled"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="0" {{ ($room->is_enabled == 0) ? 'selected' : '' }}>{{ trans('site.no') }}</option>
                                        <option value="1" {{ ($room->is_enabled == 1) ? 'selected' : '' }}>{{ trans('site.yes') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.room.image') }}</label>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input type="text"
                                                       class="form-control"
                                                       name="image"
                                                       id="avatar"
                                                       readonly hidden
                                                       value="{{ ($room->image) ? $room->image : '' }}"/>
                                                <button type="button" data-avatar="avatar"
                                                        class="btn btn-blue btn-square waves-effect waves-light px-4 mt-3 mb-3 get_image">
                                                    {{ trans('site.button_choose')}}
                                                </button>
                                                <button type="button" data-avatar="avatar"
                                                        {{ ($room->image) ? '' : 'disabled' }} class="btn btn-danger btn-square waves-effect waves-light px-4 mt-3 mb-3 ml-3 remove_image">
                                                    {{ trans('site.button_remove')}}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img id="image_avatar"
                                                 src="{{ ($room->image) ? asset($room->image) : asset('admin/assets/images/no_img.jpg') }}"
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
                            <i class="mdi mdi-check-all mr-2"></i>{{ trans('site.button_update')}}</button>
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