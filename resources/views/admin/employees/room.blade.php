@extends('admin.master')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="{{ route('deposits.create') }}">Đặt cọc mới</a>
                </div>
                <h4 class="page-title">Danh sách phòng trống</h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th data-priority="1">{{trans('site.room.image')}}</th>
                                    <th data-priority="1">Loại</th>
                                    <th data-priority="1">{{trans('site.room.name')}}</th>
                                    <th data-priority="1">{{trans('site.room.amount')}}</th>
                                    <th data-priority="1">{{trans('site.room.acreage')}}</th>
                                    <th data-priority="1">{{trans('site.room.price')}}</th>
                                    <th data-priority="1">{{ trans('site.room.is_enabled') }}</th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($readyRooms as $room)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <img src="{{ Sanitize::showImage($room->image) }}" width="100"/>
                                        </td>
                                        <td>
                                            {{$room->type->name}}
                                        </td>
                                        <td>
                                            {{$room->name}}
                                        </td>
                                        <td>
                                            {{ $room->amount}}
                                        </td>
                                        <td>
                                            {{ $room->acreage}}
                                        </td>
                                        <td>
                                            {{ $room->price}}
                                        </td>
                                        <td>
                                            @if($room->is_enabled )
                                                <div class="custom-control custom-switch switch-primary">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchStatusSwitchStatus{{ $room->id }}"
                                                           checked>
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus{{ $room->id }}"></label>
                                                </div>
                                            @else
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchcustomSwitchStatus{{ $room->id }}">
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus{{ $room->id }}"></label>
                                                </div>
                                            @endif
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