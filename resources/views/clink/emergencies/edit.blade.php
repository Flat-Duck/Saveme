@extends('clink.layouts.app', ['page' => 'emergency'])

@section('title', 'تعديل الطوارئ')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل الطوارئ</h3>
            </div>

            <form role="form" method="POST" action="{{ route('clink.emergencies.update', ['emergency' => $emergency->id]) }}">
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
                            value="{{ old('name', $emergency->name) }}"
                            id="name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="qualification">المؤهل</label>
                        <input type="text"
                            class="form-control"
                            name="qualification"
                            required
                            placeholder="المؤهل"
                            value="{{ old('qualification', $emergency->qualification) }}"
                            id="qualification"
                        >
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">تعديل</button>

                    <a href="{{ route('clink.emergencies.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
