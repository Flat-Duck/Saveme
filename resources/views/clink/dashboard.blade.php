@extends('clink.layouts.app', ['page' => 'dashboard'])

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
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ auth()->user()->clink->tests()->count() }}</h3>

                                <h2>عدد التحاليل</h2>
                            </div>
                            <div class="icon">
                                <i class="fa fa-flask"></i>
                            </div>
                            <a href="{{ route('clink.reactive') }}" class="small-box-footer">
                                تفاصيل اكتر <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ auth()->user()->clink->specialties()->count() }}</h3>

                                <h2>عدد التخصصات</h2>
                            </div>
                            <div class="icon">
                                <i class="fa fa-cubes"></i>
                            </div>
                            <a href="{{ route('clink.reactive') }}" class="small-box-footer">
                                تفاصيل اكتر <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{ auth()->user()->clink->doctors()->count() }}</h3>

                                <h2>عدد الاطباء</h2>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-md"></i>
                            </div>
                            <a href="{{ route('clink.reactive') }}" class="small-box-footer">
                                تفاصيل اكتر <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{ auth()->user()->clink->devices()->count() }}</h3>

                                <h2>عدد الاجهزة</h2>
                            </div>
                            <div class="icon">
                                <i class="fa fa-desktop"></i>
                            </div>
                            <a href="{{ route('clink.reactive') }}" class="small-box-footer">
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
