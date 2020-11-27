@extends('clink.layouts.app', ['page' => 'device'])

@section('title', 'تعديل الجهاز')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل الجهاز</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('clink.devices.update', ['device' => $device->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">الإسم</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="الإسم"
                            value="{{ old('name', $device->name) }}"
                            id="name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea class="form-control"
                            name="description"
                            id="description"
                            required
                            placeholder="الوصف"
                        >{{ old('description', $device->description) }}</textarea>
                    </div>

                    <img src="{{ $device->getFirstMediaUrl('picture') }}"
                        width="50"
                        alt="الصورة "
                    >
                    <div class="form-group">
                        <label for="picture">الصورة</label>
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
                    <button type="submit" class="btn btn-primary">تعديل</button>

                    <a href="{{ route('clink.devices.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
