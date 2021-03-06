<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="{{ mix('/css/admin/vendor.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/admin/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    {{-- You can put page wise internal css style in styles section
    --}}
    @stack('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body dir="rtl" class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        {{-- Header --}}
        <header class="main-header">

            {{-- Logo --}}
            <a href="{{ route('clink.dashboard') }}" class="logo">
                <span class="logo-mini">{{ config('app.name') }}</span>
                <span class="logo-lg">{{ config('app.name') }}</span>
            </a>

            {{-- Header Navbar --}}
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        {{-- User Account Menu --}}
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('images/admin-avatar.png') }}" class="user-image" alt="Admin avatar">

                                <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="{{ asset('images/admin-avatar.png') }}" class="img-circle"
                                        alt="Admin avatar">

                                    <p>{{ Auth::guard('admin')->user()->name }}</p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('clink.profile') }}" class="btn btn-default btn-flat">
                                            الملف الشخصي
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('clink.logout') }}" class="btn btn-default btn-flat">تسجيل خروج</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            {{-- Sidebar --}}
            <section class="sidebar">

                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('images/admin-avatar.png') }}" class="img-circle" alt="Admin avatar">
                    </div>

                    <div class="pull-left info">
                        <p>{{ Auth::guard('admin')->user()->name }}</p>
                    </div>
                </div>

                {{-- Sidebar Menu --}}
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">القائمة</li>

                    <li {{ $page == 'dashboard' ? ' class=active' : '' }}>
                        <a href="{{ route('clink.dashboard') }}">
                            <i class="fa fa-building"></i>
                            <span>لوحة التحكم</span>
                        </a>
                    </li>
                    <li {{ $page == 'settings' ? ' class=active' : '' }}>
                        <a href="{{ route('clink.settings.edit') }}">
                            <i class="fa fa-hospital-o"></i>
                            <span>بيانات العيادة</span>
                        </a>
                    </li>
                    <li {{ $page == 'admins' ? ' class=active' : '' }}>
                        <a href="{{ route('clink.admins.index') }}">
                            <i class="fa fa-users"></i>
                            <span>إدارة مستخدمين العيادة </span>
                        </a>
                    </li>
                    
                    <li {{ $page == 'reactive' ? ' class=active' : '' }}>
                        <a href="{{ route('clink.reactive') }}">
                            <i class="fa fa-cogs"></i>
                            <span>الصفحة التفاعلية</span>
                        </a>
                    </li>
                    <li {{ $page == 'service' ? ' class=active' : '' }}>
                        <a href="{{ route('clink.services.index') }}">
                            <i class="fa fa-star-o"></i>
                            <span>الخدمات</span>
                        </a>
                    </li>

                    <li {{ $page == 'emergency' ? ' class=active' : '' }}>
                        <a href="{{ route('clink.emergencies.index') }}">
                            
                            <i class="fa fa-ambulance"></i>
                            <span>الطوارئ</span>
                        </a>
                    </li>

                    <li {{ $page == 'appointment' ? ' class=active' : '' }}>
                        <a href="{{ route('clink.appointments.index') }}">
                            <i class="fa fa-calendar"></i>
                            
                            <span>المواعيد</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>


        <div class="content-wrapper">
            {{-- Page header --}}
            <section class="content-header">
                <h1>
                    @yield('title')
                </h1>
            </section>

            {{-- Page Content --}}
            <section class="content container-fluid">
                @if ($errors->all())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                @yield('content')
            </section>
        </div>

    </div>

    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    @if (session('message'))
        <script>
            showNotice("{{ session('type') }}", "{{ session('message') }}");

        </script>
    @endif
    <script>
        $(function() {
            //Initialize Select2 Elements   
            $('.select2').select2();
        });

    </script>
    {{-- You can put page wise javascript in scripts section
    --}}
    @stack('scripts')
</body>

</html>
