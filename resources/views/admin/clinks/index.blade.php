@extends('admin.layouts.app', ['page' => 'clink'])

@section('title', 'العيادات')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">العيادات</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.clinks.create') }}">
                    إضافة جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>رقم الهاتف</th>
                        <th>إحداثيات الطول</th>
                        <th>إحداثيات العرض</th>
                        <th>الحالة</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($clinks as $k=> $clink)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $clink->name }}</td>
                            <td>{{ $clink->phone_number }}</td>
                            <td>{{ $clink->latitude }}</td>
                            <td>{{ $clink->longitude }}</td>
                            @if ($clink->status)
                            <td><span class="badge bg-green"> مفعلة</span></td>
                            
                            @else
                            <td><span class="badge bg-red">غير مفعلة</span></td>
                            @endif 
                            <td>
                                <a href="{{ route('admin.clinks.edit', ['clink' => $clink->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.clinks.destroy', ['clink' => $clink->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                                        <i class="fa fa-lock"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">لاتوجد سجلات</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $clinks->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
