@extends('clink.layouts.app', ['page' => 'device'])

@section('title', 'الأجهزة')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">الأجهزة</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('clink.devices.create') }}">
                    إضافة جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>الصورة</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($devices as $device)
                        <tr>
                            <td>{{ $device->id }}</td>
                            <td>{{ $device->name }}</td>
                            <td>
                                <img src="{{ $device->getFirstMediaUrl('picture') }}"
                                    width="50"
                                    alt="الصورة "
                                >
                            </td>
                            <td>
                                <a href="{{ route('clink.devices.edit', ['device' => $device->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('clink.devices.destroy', ['device' => $device->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">لاتوجد سجلات</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            {{-- <div class="box-footer clearfix">
                {{ $devices->links('vendor.pagination.default') }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
