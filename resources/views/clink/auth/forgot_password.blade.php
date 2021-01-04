@extends('clink.layouts.guest')

@section('title', 'Forgot كلمة المرور')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
          تم ارسال رسالة تعيين كلمة  المرور تحتوي علي رابط اعادة التعيين
        </div>
    @endif

    <p class="login-box-msg">الرجاء ادخال بريدك الالكتروني</p>

    <form method="post">
        @csrf

        <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required autofocus>
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-flat">  ارسال رسالة اعادة ظبط كلمة المرور </button>
        </div>
    </form>

    <a href="{{ route('clink.login') }}">
        تسجيل دخول
    </a>
@endsection
