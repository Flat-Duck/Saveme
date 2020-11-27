@extends('clink.layouts.app', ['page' => 'service'])

@section('title', 'إضافة جديدService')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة جديدService</h3>
            </div>

            <form role="form" method="POST" action="{{ route('clink.services.store') }}">
                @csrf

               
                <div class="box-body">
                    <div class="form-group">
                        <label for="doctor_id">الأطباء</label>
                        <select class=" select2 form-control" name="doctor_id"   id="doctor_id">
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service_id">الخدمات</label>
                        <select class="select2 form-control" name="service_id"  id="service_id">
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">حفظ</button>

                    <a href="{{ route('clink.services.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
