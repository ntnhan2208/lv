@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="{{ route('customers.store','room='.$room)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('site.customer.name') }} </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="name" class="form-control"
                                       placeholder="{{ trans('site.customer.name') }}"
                                       value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('site.customer.phone') }} </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="phone" class="form-control"
                                       placeholder="{{ trans('site.customer.phone') }}"
                                       value="{{old('phone')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('site.customer.email') }} </label>
                            <div class="input-group">
                                <input type="email" id="example-input1-group1" name="email" class="form-control"
                                       placeholder="{{ trans('site.customer.email') }}"
                                       value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('site.customer.personal_id') }} </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="personal_id" class="form-control"
                                       placeholder="{{ trans('site.customer.personal_id') }}"
                                       value="{{ old('personal_id') }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            {{ trans('site.button_add') }}
                        </button>
                        <a href="{{ route('customers.index') }}">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> {{trans('site.reset') }} </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
