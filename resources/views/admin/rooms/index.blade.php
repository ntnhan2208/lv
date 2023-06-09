@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row mt-2">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a class="nav-link active" href="#all" role="tab" data-toggle="tab">Quản lý căn hộ</a>
                        </li>
                        <li><a class="nav-link" href="#empty" role="tab" data-toggle="tab">Căn hộ còn trống</a>
                        </li>
                        <li><a class="nav-link" href="#booked" role="tab" data-toggle="tab">Căn hộ đã cho thuê</a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <div class="page-title-box">
                        <div class="float-right">
                            <a class="btn btn-primary float-right"
                               href="{{ route('rooms.create') }}">{{ trans('site.add') }}</a>
                        </div>
                        <h4 class="page-title">{{trans('site.room.title')}}</h4>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th data-priority="1">{{trans('site.room.image')}}</th>
                                            <th data-priority="1">{{trans('site.room.name')}}</th>
                                            <th data-priority="1">{{trans('site.room.amount')}}</th>
                                            <th data-priority="1">{{trans('site.room.acreage')}}</th>
                                            <th data-priority="1">{{trans('site.room.price')}}</th>
                                            <th data-priority="1">{{ trans('site.room.is_enabled') }}</th>
                                            <th data-priority="1"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rooms as $room)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    <img src="{{ Sanitize::showImage($room->image) }}" width="100"/>
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
                                                <td>
                                                    <form class="float-right"
                                                          action="{{ route('rooms.destroy',$room->id) }}"
                                                          method="POST"
                                                          onSubmit="if(!confirm('{{ trans('site.confirm') }}')) {return false;}">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-xs btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    <div class="float-right mr-3">
                                                        <a href="{{ route('rooms.edit', $room->id) }}"
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
                <div class="tab-pane" id="empty">
                    <div class="page-title-box">
                        <div class="float-right">
                            <a class="btn btn-primary float-right"
                               href="{{ route('bookings.create') }}">{{ trans('site.book') }}</a>
                        </div>
                        <h4 class="page-title">Căn hộ còn trống</h4>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th data-priority="1">{{trans('site.room.image')}}</th>
                                            <th data-priority="1">{{trans('site.room.name')}}</th>
                                            <th data-priority="1">{{trans('site.room.type')}}</th>
                                            <th data-priority="1">{{trans('site.room.amount')}}</th>
                                            <th data-priority="1">{{trans('site.room.acreage')}}</th>
                                            <th data-priority="1">{{trans('site.room.price')}}</th>
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
                                                    {{$room->name}}
                                                </td>
                                                <td>
                                                    {{$room->type->name}}
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

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="booked">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th data-priority="1">{{trans('site.room.image')}}</th>
                                            <th data-priority="1">{{trans('site.room.name')}}</th>
                                            <th data-priority="1">{{trans('site.room.type')}}</th>
                                            <th data-priority="1">{{trans('site.booking.customer')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bookedRooms as $room)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    <img src="{{ Sanitize::showImage($room->image) }}" width="100"/>
                                                </td>
                                                <td>
                                                    {{$room->name}}
                                                </td>
                                                <td>
                                                    {{$room->type->name}}
                                                </td>
                                                <td>
                                                    {{$room->booking->customer->name}}
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

        </div>
    </div>
@endsection
