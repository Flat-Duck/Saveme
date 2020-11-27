@extends('clink.layouts.app', ['page' => 'service'])

@section('title', 'تعديل الخدمة')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل الخدمة</h3>
            </div>

            <form role="form" method="POST" action="{{ route('clink.services.update', ['service' => $service->id]) }}">
                @csrf
                @method('PUT')

 
                <div class="box-body">
                    <div class="form-group">
                        <label for="doctor_id">الطبيب</label>
                        <select class=" select2 form-control" name="doctor_id" id="doctor_id">
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}"
                                    {{  old('doctor_id', $doctor->id)  == $service->doctor_id ? 'selected' : '' }}>
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service_id">الخدمات</label>
                        <select class="select2 form-control" name="service_id"  id="service_id">
                            @foreach ($services as $servic)
                                <option value="{{ $servic->id }}"
                                    {{  old('service_id', $servic->id)  == $service->service_id ? 'selected' : '' }}>
                                    {{ $servic->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">تعديل</button>

                    <a href="{{ route('clink.services.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
