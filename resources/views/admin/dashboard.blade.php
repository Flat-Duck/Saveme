@extends('admin.layouts.app', ['page' => 'dashboard'])

@section('title', 'لوحة التحكم الرئيسية')
@section('styles')

@endsection
@section('content')
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">لوحة التحكم الرئيسية</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{ App\Clink::all()->count() }}</h3>

                                <h2>عدد العيادات</h2>
                            </div>
                            <div class="icon">
                                <i class="fa fa-hospital-o"></i>
                            </div>
                            <a href="{{ route('admin.clinks.index') }}" class="small-box-footer">
                                تفاصيل اكتر <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ App\Admin::whereNotNull('clink_id')->get()->count() }}</h3>

                                <h2>عدد المستخدمين</h2>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                تفاصيل اكتر <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ App\Doctor::all()->count() }}</h3>

                                <h2>عدد الاطباء</h2>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-md"></i>
                            </div>
                            <a href="{{ route('admin.doctors.index') }}" class="small-box-footer">
                                تفاصيل اكتر <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{ App\Device::all()->count() }}</h3>

                                <h2>عدد الاجهزة</h2>
                            </div>
                            <div class="icon">
                                <i class="fa fa-desktop"></i>
                            </div>
                            <a href="{{ route('admin.devices.index') }}" class="small-box-footer">
                                تفاصيل اكتر <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
        </div>
    </div>
@endsection
