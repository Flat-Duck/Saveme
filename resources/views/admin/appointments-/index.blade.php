@extends('admin.layouts.app', ['page' => 'appointment'])

@section('title', 'المواعيد')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">المواعيد</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.appointments.create') }}">
                    إضافة جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Start Time</th>
                        <th>Finish Time</th>
                        <th>العيادة</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->start_time }}</td>
                            <td>{{ $appointment->finish_time }}</td>
                            <td>{{ $appointment->clink->name }}</td>
                            <td>
                                <a href="{{ route('admin.appointments.edit', ['appointment' => $appointment->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.appointments.destroy', ['appointment' => $appointment->id]) }}"
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
                {{ $appointments->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
