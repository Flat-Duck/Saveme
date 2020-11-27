@extends('clink.layouts.app', ['page' => 'admin'])

@section('title', 'إدارة المستخدمين')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">إدارة المستخدمين</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('clink.admins.create') }}">
                    إضافة جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>الاسم </th>
                        <th>اسم المستخدم</th>
                        <th>البريد الالكتروني</th>
                        <th>حالة المستخدم</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($admins as $k=> $admin)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->username }}</td>
                            <td>{{ $admin->email }}</td>
                            {{-- <td>{{ $admin->active }}</td> --}}
                            @if ($admin->active)
                <td><span class="badge bg-green"> غير موقوف</span></td>
                
                @else
                <td><span class="badge bg-red">موقوف</span></td>
                @endif 
                      
                            <td>
                                <a href="{{ route('clink.admins.edit', ['admin' => $admin->id]) }}">
                                   <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('clink.admins.destroy', ['admin' => $admin->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                                        @if ($admin->active)
                                        <span class="badge bg-red">  <i class="fa fa-lock"></i></span>
                                        
                                        @else
                                        <span class="badge bg-green">  <i class="fa fa-lock-open"></i></span>
                                        @endif 
                                        
                                   
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">لاتوجد سجلات</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $admins->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
