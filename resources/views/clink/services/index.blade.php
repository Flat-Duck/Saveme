@extends('clink.layouts.app', ['page' => 'service'])

@section('title', 'الخدمات')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">الخدمات</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('clink.services.create') }}">
                    إضافة جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>اسم الخدمة</th>
                        <th>اسم الطبيب</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($services as $k=> $service)
                        <tr>
                            <td>{{ $k +1}}</td>
                            <td>{{ $service->service->name }}</td>
                            <td>{{ $service->doctor->name  }}</td>
                            <td>
                                <a href="{{ route('clink.services.edit', ['service' => $service->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('clink.services.destroy', ['service' => $service->id]) }}"
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
                            <td colspan="3">لاتوجد سجلات</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            {{-- <div class="box-footer clearfix">
                {{ $services->links('vendor.pagination.default') }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
