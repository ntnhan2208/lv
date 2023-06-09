@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="{{ route('employees.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ trans('site.employee.name') }} </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="name" class="form-control"
                                               placeholder="{{ trans('site.employee.name') }}"
                                               value="{{old('name')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>{{ trans('site.employee.personal_id') }} </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="personal_id"
                                               class="form-control integerInput"
                                               placeholder="{{ trans('site.employee.personal_id') }}"
                                               value="{{old('personal_id')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>{{ trans('site.employee.gender') }} </label>
                                    <div class="input-group">
                                        <select name="gender"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                            @foreach(config('system.gender') as $k => $v)
                                                <option value="{{ $k }}" {{old('gender') == $k ? 'selected':''}}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ trans('site.employee.email') }} </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="email" class="form-control"
                                               placeholder="{{ trans('site.employee.email') }}"
                                               value="{{old('email')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ trans('site.employee.phone') }} </label>
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group1" name="phone"
                                               class="form-control"
                                               placeholder="{{ trans('site.employee.phone') }}"
                                               value="{{old('phone')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ trans('site.employee.image') }}</label>
                                    <div class="row">
                                        <div class="col-6">
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Phần trăm hoa hồng</label>
                                    <div class="input-group">
                                        <input type="text" id="commission" name="commission"
                                               class="form-control integerInput"
                                               value="{{old('commission')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.admin.password') }}  </label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control"
                                               placeholder="{{ trans('site.admin.password') }}">
                                    </div>
                                </div>
                                <input type="text" id="example-input1-group1" name="role" value="1" class="form-control" hidden readonly>
                            </div>
                            <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                                <i class="mdi mdi-plus-circle-outline mr-2"></i>
                                {{ trans('site.button_add') }}
                            </button>
                            <a href="{{ route('employees.index') }}">
                                <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> {{trans('site.reset') }} </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#commission').on('keyup', function (){
            var percent = $('#commission').val();
            if(percent>100){
                alert('Phần trăm hoa hồng không được lớn hơn 100%');
                $('#commission').val(20);
            }
        });
    </script>
@endsection
