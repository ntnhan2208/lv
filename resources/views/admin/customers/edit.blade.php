@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="{{ route('customers.update',$customer->id)}}" method="POST"
                          enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('site.customer.name') }} </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="name" class="form-control"
                                       value="{{$customer->name}}" {{$customer->bookings()->exists() ? "style=pointer-events:none" : ''}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('site.customer.phone') }} </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="phone" class="form-control integerInput" maxlength="10"
                                       value="{{$customer->phone}}" {{$customer->bookings()->exists() ? "style=pointer-events:none" : ''}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('site.customer.email') }} </label>
                            <div class="input-group">
                                <input type="email" id="example-input1-group1" name="email" class="form-control"
                                       value="{{$customer->email}}" {{$customer->bookings()->exists() ? "style=pointer-events:none" : ''}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('site.customer.personal_id') }} </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="personal_id" class="form-control integerInput"
                                       value="{{$customer->personal_id}}" {{$customer->bookings()->exists() ? "style=pointer-events:none" : ''}}>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            {{ trans('site.button_update') }}
                        </button>
                        <a href="{{ url()->previous() }}">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> {{trans('site.reset') }} </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

