@extends('admin.layouts.app', ['page' => 'device'])

@section('title', 'Add New Device')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Device</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.devices.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="Name"
                            value="{{ old('name') }}"
                            id="name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control"
                            name="description"
                            id="description"
                            required
                            placeholder="Description"
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input type="file"
                            class="form-control"
                            name="picture"
                            required
                            value="{{ old('picture') }}"
                            id="picture"
                        >
                    </div>

                    <div class="form-group">
                        <label for="clink-id">Clink</label>
                        <select class="form-control"
                            name="clink_id"
                            required
                            id="clink-id"
                        >
                            @foreach ($clinks as $clink)
                                <option value="{{ $clink->id }}"
                                    {{ old('clink_id') == $clink->id ? 'selected' : '' }}
                                >
                                    {{ $clink->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.devices.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
