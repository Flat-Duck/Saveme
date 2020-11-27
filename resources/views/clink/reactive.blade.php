@extends('clink.layouts.app', ['page' => 'reactive'])

@section('title', 'الصفحة التفاعلية')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">تعديل الصفحة التفاعلية</h3>
                </div>

                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('clink.reactive.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="box-body">
                        <div class="form-group">
                            <label for="doctors">الأطباء</label>
                            <select class=" select2 form-control" name="doctors[]"  multiple id="doctors">
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}"
                                        {{ in_array($doctor->id, old('doctors', $clink->doctors)) ? 'selected' : '' }}>
                                        {{ $doctor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="devices">الاجهزة</label>
                            <select class=" select2 form-control" name="devices[]"  multiple id="devices">
                                @foreach ($devices as $device)
                                    <option value="{{ $device->id }}"
                                        {{ in_array($device->id, old('devices', $clink->devices)) ? 'selected' : '' }}>
                                        {{ $device->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="specialties">التخصصات</label>
                            <select class=" select2 form-control" name="specialties[]"  multiple id="specialties">
                                @foreach ($specialties as $specialty)
                                    <option value="{{ $specialty->id }}"
                                        {{ in_array($specialty->id, old('specialties', $clink->specialties)) ? 'selected' : '' }}>
                                        {{ $specialty->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tests">التحاليل</label>
                            <select class="select2 form-control" name="tests[]"  multiple id="tests">
                                @foreach ($tests as $test)
                                    <option value="{{ $test->id }}"
                                        {{ in_array($test->id, old('tests', $clink->tests)) ? 'selected' : '' }}>
                                        {{ $test->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="services">الخدمات</label>
                            <select class="select2 form-control" name="services[]"  multiple id="services">
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}"
                                        {{ in_array($service->id, old('services', $clink->services)) ? 'selected' : '' }}>
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}
                        
                         <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="hidden" name="beds" value="0">
                                <input type="checkbox" name="beds" value="1"
                                    {{ old('beds', $clink->beds) == 1 ? 'checked' : '' }}>
                                يوجد اسرة متوفرة
                            </label>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">تعديل</button>

                            <a href="{{ route('clink.dashboard') }}" class="btn btn-default">
                                إلغاء
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </div>



@endsection
