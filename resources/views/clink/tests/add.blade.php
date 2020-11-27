@extends('clink.layouts.app', ['page' => 'test'])

@section('title', 'إضافة جديدTest')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة جديدTest</h3>
            </div>

            <form role="form" method="POST" action="{{ route('clink.tests.store') }}">
                @csrf
                
                <div class="box-body">
                <div class="form-group">
                    <label for="tests">التحليل</label>
                    <select class=" select2 form-control" name="tests[]" required multiple id="tests">
                        @foreach ($tests as $test)
                        <option value="{{ $test->id }}" {{ in_array($test->id, old('tests', $clink->tests->pluck('id'))) ? 'selected' : '' }}>
                            {{ $test->name }}
                        </option>
                        @endforeach
                    </select>
                </div>



                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">حفظ</button>

                    <a href="{{ route('clink.tests.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
