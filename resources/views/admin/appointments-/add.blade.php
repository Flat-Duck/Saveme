@extends('admin.layouts.app', ['page' => 'appointment'])

@section('title', 'إضافة جديدAppointment')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة جديدAppointment</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.appointments.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <input type="time"
                            class="form-control"
                            name="start_time"
                            required
                            placeholder="Start Time"
                            value="{{ old('start_time') }}"
                            step="2"
                            id="start_time"
                        >
                    </div>

                    <div class="form-group">
                        <label for="finish_time">Finish Time</label>
                        <input type="time"
                            class="form-control"
                            name="finish_time"
                            required
                            placeholder="Finish Time"
                            value="{{ old('finish_time') }}"
                            step="2"
                            id="finish_time"
                        >
                    </div>

                    <div class="form-group">
                        <label for="clink-id">العيادة</label>
                        <select class="form-control"
                            name="clink_id"
                            required
                            id="clink-id"
                        >
                            @foreach ($clinks as $clink)
                                <option value="{{ $clink->id }}"
                                    {{ old('clink_id') == $clink->id ? 'selected' : '' }}
                                >
                                    {{ $clink->name }}
                                </option>
                            @endforeach
                        </select>
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

                    <a href="{{ route('admin.appointments.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
