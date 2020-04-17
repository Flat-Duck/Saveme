@extends('clink.layouts.app', ['page' => 'appointment'])

@section('title', 'Edit Appointment')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Appointment</h3>
            </div>

            <form role="form" method="POST" action="{{ route('clink.appointments.update', ['appointment' => $appointment->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <input type="time"
                            class="form-control"
                            name="start_time"
                            required
                            placeholder="Start Time"
                            value="{{ old('start_time', $appointment->start_time) }}"
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
                            value="{{ old('finish_time', $appointment->finish_time) }}"
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
                            value="{{ old('day', $appointment->day) }}"
                            id="day">
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
                                    {{ old('doctor_id', $appointment->doctor_id) == $doctor->id ? 'selected' : '' }}
                                >
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('clink.appointments.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection