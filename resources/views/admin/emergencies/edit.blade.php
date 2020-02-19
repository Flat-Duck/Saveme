@extends('admin.layouts.app', ['page' => 'emergency'])

@section('title', 'Edit Emergency')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Emergency</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.emergencies.update', ['emergency' => $emergency->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="Name"
                            value="{{ old('name', $emergency->name) }}"
                            id="name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="qualification">Qualification</label>
                        <input type="text"
                            class="form-control"
                            name="qualification"
                            required
                            placeholder="Qualification"
                            value="{{ old('qualification', $emergency->qualification) }}"
                            id="qualification"
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
                                    {{ old('clink_id', $emergency->clink_id) == $clink->id ? 'selected' : '' }}
                                >
                                    {{ $clink->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('admin.emergencies.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
