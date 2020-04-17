@extends('clink.layouts.app', ['page' => 'appointment'])

@section('title', 'Add New Appointment')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Appointment</h3>
            </div>

            <form role="form" method="POST" action="{{ route('clink.appointments.store') }}">
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
                        <label for="day">Day</label>
                        <input type="text"
                            class="form-control"
                            name="day"
                            required
                            placeholder="Finish Time"
                            value="{{ old('day') }}"
                            id="day"
                        >
                    </div>
                    <div class="form-group">
                        <label for="doctor-id">Doctor</label>
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
            <input type="hidden" name="clink_id" value="{{$clink}}">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('clink.appointments.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection