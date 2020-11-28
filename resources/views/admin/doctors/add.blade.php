@extends('admin.layouts.app', ['page' => 'doctor'])

@section('title', 'إضافة طبيب جديد ')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة طبيب جديد </h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.doctors.store') }}">
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

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">حفظ</button>

                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
