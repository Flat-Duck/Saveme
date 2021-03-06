@extends('admin.layouts.app', ['page' => 'emergency'])

@section('title', 'Emergencies')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Emergencies</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.emergencies.create') }}">
                    إضافة جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>المؤهل</th>
                        <th>العيادة</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($emergencies as $emergency)
                        <tr>
                            <td>{{ $emergency->id }}</td>
                            <td>{{ $emergency->name }}</td>
                            <td>{{ $emergency->qualification }}</td>
                            <td>{{ $emergency->clink->name }}</td>
                            <td>
                                <a href="{{ route('admin.emergencies.edit', ['emergency' => $emergency->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.emergencies.destroy', ['emergency' => $emergency->id]) }}"
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

            <div class="box-footer clearfix">
                {{ $emergencies->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
