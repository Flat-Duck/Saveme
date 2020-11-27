@extends('clink.layouts.app', ['page' => 'device'])

@section('title', 'إضافة  جديد')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة  جديد</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('clink.devices.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">الإسم</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="الإسم"
                            value="{{ old('name') }}"
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
                        >{{ old('description') }}</textarea>
                    </div>

                    
                    <div class="form-group">
                        <label for="picture">الصورة</label>
                        <input type="file"
                            class="form-control"
                            name="picture"
                            required
                            value="{{ old('picture') }}"
                            id="picture"
                        >
                    </div>
                </div>

           <input type="hidden" name="clink_id" value="{{$clink}}">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">حفظ</button>

                    <a href="{{ route('clink.devices.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
