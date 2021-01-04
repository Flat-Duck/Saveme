@extends('clink.layouts.guest')

@section('title', 'Reset كلمة المرور')

@section('content')
    <p class="login-box-msg">الرجاء ادخال كلمة المرور الجديدة</p>

    <form method="post" action="{{ route('clink.reset_password') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group has-feedback">
            <input type="email"
                name="email"
                class="form-control"
                value="{{ $email ?? old('email') }}"
                placeholder="البريد الإلكتروني"
                required
                autofocus
            >
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
            <span class="fa fa-lock form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="password" name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور" required>
            <span class="fa fa-lock form-control-feedback"></span>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-flat">اعادة تعيين كلمة المرور</button>
        </div>
    </form>
@endsection
