@extends('admin.layouts.guest')

@section('title', 'Forgot كلمة المرور')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <p class="login-box-msg">الرجاء ادخال البريد الالكتروني</p>

    <form method="post">
        @csrf

        <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required autofocus>
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-flat">إرسال رسالة تغيير كلمة المرور</button>
        </div>
    </form>

    <a href="{{ route('admin.login') }}">
        تسجيل دخول
    </a>
@endsection
