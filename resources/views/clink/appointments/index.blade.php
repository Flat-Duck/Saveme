@extends('clink.layouts.app', ['page' => 'appointment'])

@section('title', 'Appointments')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Appointments</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('clink.appointments.create') }}">
                    Add New
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>Finish Time</th>
                        <th>Doctor</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->day }}</td>
                            <td>{{ $appointment->start_time }}</td>
                            <td>{{ $appointment->finish_time }}</td>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>
                                <a href="{{ route('clink.appointments.edit', ['appointment' => $appointment->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('clink.appointments.destroy', ['appointment' => $appointment->id]) }}"
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
                            <td colspan="5">No records found</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            {{-- <div class="box-footer clearfix">
                {{ $appointments->links('vendor.pagination.default') }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
