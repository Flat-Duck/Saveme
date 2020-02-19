@extends('clink.layouts.app', ['page' => 'device'])

@section('title', 'Edit Device')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Device</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('clink.devices.update', ['device' => $device->id]) }}">
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
                            value="{{ old('name', $device->name) }}"
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
                        >{{ old('description', $device->description) }}</textarea>
                    </div>

                    <img src="{{ $device->getFirstMediaUrl('picture') }}"
                        width="50"
                        alt="Picture image"
                    >
                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input type="file"
                            class="form-control"
                            name="picture"
                            
                            value="{{ old('picture', $device->picture) }}"
                            id="picture"
                        >
                    </div>
                </div>
               <input type="hidden" name="clink_id" value="{{$clink}}">

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('clink.devices.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
