@extends('admin.master')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col-lg-4"><h4 class="page-title">Danh sách hoa hồng</h4></div>
                </div>
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
                                    <th data-priority="1" class="text-center"></th>
                                    <th data-priority="1">Thời gian</th>
                                    <th data-priority="1">Căn hộ</th>
                                    <th data-priority="1">Hoa hồng</th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($commission as $value)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y') }}
                                        </td>
                                        <td>
                                            {{ \App\Models\Room::find($value->room_id)->name }}
                                        </td>
                                        <td>
                                            @money($value->commission)
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-{{ $value->status==1 ? 'success' : 'danger' }}">{{ $value->status==1 ? 'Đã thanh toán' : 'Chưa thanh toán' }}</span>
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