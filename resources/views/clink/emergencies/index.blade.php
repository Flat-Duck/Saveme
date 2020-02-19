@extends('clink.layouts.app', ['page' => 'emergency'])

@section('title', 'Emergencies')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Emergencies</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('clink.emergencies.create') }}">
                    Add New
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Qualification</th>
                        <th>Clink</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($emergencies as $emergency)
                        <tr>
                            <td>{{ $emergency->id }}</td>
                            <td>{{ $emergency->name }}</td>
                            <td>{{ $emergency->qualification }}</td>
                            <td>{{ $emergency->clink->name }}</td>
                            <td>
                                <a href="{{ route('clink.emergencies.edit', ['emergency' => $emergency->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('clink.emergencies.destroy', ['emergency' => $emergency->id]) }}"
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
                {{ $emergencies->links('vendor.pagination.default') }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
