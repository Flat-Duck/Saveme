@extends('admin.layouts.app', ['page' => 'clink'])

@section('title', 'Edit Clink')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Clink</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.clinks.update', ['clink' => $clink->id]) }}">
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
                            value="{{ old('name', $clink->name) }}"
                            id="name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text"
                            class="form-control"
                            name="phone_number"
                            required
                            placeholder="Phone Number"
                            value="{{ old('phone_number', $clink->phone_number) }}"
                            id="phone_number"
                        >
                    </div>

                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="number"
                            class="form-control"
                            name="latitude"
                            required
                            placeholder="Latitude"
                            value="{{ old('latitude', $clink->latitude) }}"
                            step="any"
                            id="latitude"
                        >
                    </div>

                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="number"
                            class="form-control"
                            name="longitude"
                            required
                            placeholder="Longitude"
                            value="{{ old('longitude', $clink->longitude) }}"
                            step="any"
                            id="longitude"
                        >
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox"
                                name="status"
                                value="1"
                                {{ old('status', $clink->status) == 1 ? 'checked' : '' }}
                            >
                                Status
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="hidden" name="visible" value="0">
                            <input type="checkbox"
                                name="visible"
                                value="1"
                                {{ old('visible', $clink->visible) == 1 ? 'checked' : '' }}
                            >
                                Visible
                        </label>
                    </div>

                    <img src="{{ $clink->getFirstMediaUrl('cover') }}"
                        width="50"
                        alt="Cover image"
                    >
                    <div class="form-group">
                        <label for="cover">Cover</label>
                        <input type="file"
                            class="form-control"
                            name="cover"
                            required
                            value="{{ old('cover', $clink->cover) }}"
                            id="cover"
                        >
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control"
                            name="address"
                            id="address"
                            required
                            placeholder="Address"
                        >{{ old('address', $clink->address) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number"
                            class="form-control"
                            name="price"
                            required
                            placeholder="Price"
                            value="{{ old('price', $clink->price) }}"
                            step="any"
                            id="price"
                        >
                    </div>

                    <div class="form-group">
                        <label for="specialties">Specialty</label>
                        <select class=" select2 form-control"
                            name="specialties[]"
                            required
                            multiple
                            id="specialties"
                        >
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}"
                                    {{ in_array($specialty->id, old('specialties', $clink->specialties)) ? 'selected' : '' }}
                                >
                                    {{ $specialty->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tests">Test</label>
                        <select class=" select2 form-control"
                            name="tests[]"
                            required
                            multiple
                            id="tests"
                        >
                            @foreach ($tests as $test)
                                <option value="{{ $test->id }}"
                                    {{ in_array($test->id, old('tests', $clink->tests)) ? 'selected' : '' }}
                                >
                                    {{ $test->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="services">Service</label>
                        <select class=" select2 form-control"
                            name="services[]"
                            required
                            multiple
                            id="services"
                        >
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ in_array($service->id, old('services', $clink->services)) ? 'selected' : '' }}
                                >
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('admin.clinks.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
