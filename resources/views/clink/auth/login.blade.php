@extends('clink.layouts.guest')

@section('title', 'Login')

@section('content')
    <p class="login-box-msg">الرجاء تسجيل الدخول</p>

    <form method="post">
        @csrf

        <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="إسم المستخدم">
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
            <span class="fa fa-lock form-control-feedback"></span>
        </div>

        <div class="row">
           
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">تسجيل دخول</button>
            </div>
        </div>
    </form>

    <a href="{{ route('clink.forgot_password') }}">
       لقد نسيت كلمة المرور
    </a>
@endsection
