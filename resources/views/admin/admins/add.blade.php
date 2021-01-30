@extends('admin.layouts.app', ['page' => 'admins'])

@section('title', 'إضافة مستخدم جديد')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة مستخدم جديد</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.admins.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="الاسم"
                            value="{{ old('name') }}"
                            id="name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input type="text"
                         class="form-control"
                            name="email"
                            id="email"
                            required
                            placeholder="البريد الالكتروني"
                            value="{{ old('email') }}"
                            >
                    </div>

                    <div class="form-group">
                        <label for="username">أسم المستخدم</label>
                        <input type="text"
                            class="form-control"
                            name="username"
                            required
                            placeholder="التاريخ"
                            value="{{ old('username') }}"
                            id="username"
                        >
                    </div>

                    {{-- <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="hidden" name="active" value="0">
                            <input type="checkbox"
                                name="active"
                                value="1"
                                {{ old('active') == 1 ? 'checked' : '' }}
                            >
                                مفعل
                        </label>
                    </div> --}}
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">حفظ</button>

                    <a href="{{ route('admin.admins.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
