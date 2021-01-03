@extends('clink.layouts.app', ['page' => 'appointment'])

@section('title', 'إضافة موعد جديد')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة موعد جديد</h3>
            </div>

            <form role="form" method="POST" action="{{ route('clink.appointments.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="start_time">بداية الموعد</label>
                        <input type="time"
                            class="form-control"
                            name="start_time"
                            required
                            placeholder="بداية الموعد"
                            value="{{ old('start_time') }}"
                            step="2"
                            min="09:00" max="18:00"
                            id="start_time"
                        >
                    </div>

                    <div class="form-group">
                        <label for="finish_time">نهاية الموعد</label>
                        <input type="time"
                            class="form-control"
                            name="finish_time"
                            required
                            placeholder="نهاية الموعد"
                            value="{{ old('finish_time') }}"
                            step="2"
                            id="finish_time"
                        >
                    </div>

                    <div class="form-group">
                        <label for="day">اليوم</label>
                        <input type="text"
                            class="form-control"
                            name="day"
                            required
                            placeholder="اليوم"
                            value="{{ old('day') }}"
                            id="day"
                        >
                    </div>
                    <div class="form-group">
                        <label for="doctor-id">الطبيب</label>
                        <select class="form-control"
                            name="doctor_id"
                            required
                            id="doctor-id"
                        >
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}"
                                    {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}
                                >
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">حفظ</button>

                    <a href="{{ route('clink.appointments.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
