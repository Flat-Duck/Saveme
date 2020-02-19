@extends('admin.layouts.app', ['page' => 'clink'])

@section('title', 'Clinks')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Clinks</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.clinks.create') }}">
                    Add New
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($clinks as $clink)
                        <tr>
                            <td>{{ $clink->id }}</td>
                            <td>{{ $clink->name }}</td>
                            <td>{{ $clink->phone_number }}</td>
                            <td>{{ $clink->latitude }}</td>
                            <td>{{ $clink->longitude }}</td>
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
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No records found</td>
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
