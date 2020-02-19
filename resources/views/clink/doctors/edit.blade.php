@extends('clink.layouts.app', ['page' => 'doctor'])

@section('title', 'Edit Doctor')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Doctor</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('clink.doctors.update', ['doctor' => $doctor->id]) }}">
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
                            value="{{ old('name', $doctor->name) }}"
                            id="name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text"
                            class="form-control"
                            name="phone"
                            required
                            placeholder="Phone"
                            value="{{ old('phone', $doctor->phone) }}"
                            id="phone"
                        >
                    </div>

                    <div class="form-group">
                        <label for="qualification">Qualification</label>
                        <input type="text"
                            class="form-control"
                            name="qualification"
                            required
                            placeholder="Qualification"
                            value="{{ old('qualification', $doctor->qualification) }}"
                            id="qualification"
                        >
                    </div>

                    <img src="{{ $doctor->getFirstMediaUrl('picture') }}"
                        width="50"
                        alt="Picture image"
                    >
                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input type="file"
                            class="form-control"
                            name="picture"
                            required
                            value="{{ old('picture', $doctor->picture) }}"
                            id="picture"
                        >
                    </div>
                    <div class="form-group">
                        <label for="specialty-id">Specialty</label>
                        <select class="form-control"
                            name="specialty_id"
                            required
                            id="specialty-id"
                        >
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}"
                                    {{ old('specialty_id', $doctor->specialty_id) == $specialty->id ? 'selected' : '' }}
                                >
                                    {{ $specialty->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
<input type="hidden" name="clink_id" value="{{$clink}}">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('clink.doctors.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
