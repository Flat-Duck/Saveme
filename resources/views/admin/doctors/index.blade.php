@extends('admin.layouts.app', ['page' => 'doctor'])

@section('title', 'Doctors')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Doctors</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.doctors.create') }}">
                    Add New
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Qualification</th>
                        <th>Picture</th>
                        <th>Clink</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->id }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>{{ $doctor->qualification }}</td>
                            <td>
                                <img src="{{ $doctor->getFirstMediaUrl('picture') }}"
                                    width="50"
                                    alt="Picture image"
                                >
                            </td>
                            <td>{{ $doctor->clink->name }}</td>
                            <td>
                                <a href="{{ route('admin.doctors.edit', ['doctor' => $doctor->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.doctors.destroy', ['doctor' => $doctor->id]) }}"
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
                            <td colspan="7">No records found</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $doctors->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
