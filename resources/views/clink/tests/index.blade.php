@extends('clink.layouts.app', ['page' => 'test'])

@section('title', 'التحاليل')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">التحاليل</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('clink.tests.create') }}">
                    إضافة جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($tests as $test)
                        <tr>
                            <td>{{ $test->id }}</td>
                            <td>{{ $test->name }}</td>
                            <td>
                                <a href="{{ route('clink.tests.edit', ['test' => $test->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('clink.tests.destroy', ['test' => $test->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">لاتوجد سجلات</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            {{-- <div class="box-footer clearfix">
                {{ $tests->links('vendor.pagination.default') }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
