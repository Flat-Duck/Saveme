@extends('clink.layouts.app', ['page' => 'doctor'])

@section('title', 'إضافة جديد الطبيب')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة جديد الطبيب</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('clink.doctors.store') }}">
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
                        <label for="phone">رقم الهاتف</label>
                        <input type="text"
                            class="form-control"
                            name="phone"
                            required
                            placeholder="رقم الهاتف"
                            value="{{ old('phone') }}"
                            id="phone"
                        >
                    </div>

                    <div class="form-group">
                        <label for="qualification">المؤهل</label>
                        <input type="text"
                            class="form-control"
                            name="qualification"
                            required
                            placeholder="المؤهل"
                            value="{{ old('qualification') }}"
                            id="qualification"
                        >
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
                    <div class="form-group">
                        <label for="specialty-id">التخصص</label>
                        <select class="form-control"
                            name="specialty_id"
                            required
                            id="specialty-id"
                        >
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}"
                                    {{ old('specialty_id') == $specialty->id ? 'selected' : '' }}
                                >
                                    {{ $specialty->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
<input type="hidden" name="clink_id" value="{{$clink}}">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">حفظ</button>

                    <a href="{{ route('clink.doctors.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
