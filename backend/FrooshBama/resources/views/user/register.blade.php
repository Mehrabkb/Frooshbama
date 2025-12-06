<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>ثبت نام / ورود | فروش باما</title>
    <link rel="stylesheet" href="{{ asset('assets/myassets/default.css')  }}" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.rtl.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/pages/register.css')}}" />
    <link rel="icon" type="image" href="{{ asset('images/logo.svg')}}">
  </head>
  <body>

    <div class="register-container">
      <form class="right-section" action="{{ route('login') }}" method="POST">
          @csrf
        <div class="form-container">
          <p>شماره موبایل</p>
          <div class="number-container">
            <input type="tel" inputmode="tel" placeholder="مثال: *********09" id="mobileInput">
            <button type="button" id="btn-verification-code" data-url="{{ route('confirm.code') }}" >ارسال کد</button>
          </div>
        <p>کد فعالسازی</p>
        <input type="number" id="verificationInput" placeholder="کد را اینجا وارد کنید" onkeyup="verification_input_code_change(this)">
        </div>
        <div class="alert alert-section d-none"></div>
        <div class="other-container">
          <div class="input-container">
            <input type="checkbox" id="checkBox" onchange="check_box_change(this)">
            <p>با قوانین و مقررات سایت موافق هستم</p>
          </div>
          <button id="btn-submit" type="submit" disabled>ثبت نام/ ورود</button>
        </div>
      </form>
      <div class="left-section">
        <div class="image-container">
          <img src="{{ asset('images/logo.svg')}}" alt="logo">
        </div>
        <p>فروش باما</p>
      </div>
    </div>

    <script src="{{ asset('assets/jquery/jquery.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/fontawesome/js/all.min.js')}}"></script>
    <script src="{{ asset('assets/myassets/myscript.js')}}"></script>
    <script src="{{ asset('assets/pages/register.js')}}"></script>
  </body>
</html>
