@extends('clink.layouts.app', ['page' => 'test'])

@section('title', 'Add New Test')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Test</h3>
            </div>

            <form role="form" method="POST" action="{{ route('clink.tests.store') }}">
                @csrf
                
                <div class="box-body">
                <div class="form-group">
                    <label for="tests">Test</label>
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
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('clink.tests.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
