<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEO::generate(true) !!}
    <link href="{{asset('css/user/app.css')}}" rel="stylesheet" crossorigin="anonymous">
    <script src="{{asset('js/user/app.js')}}" async  crossorigin="anonymous" ></script>
</head>

<body>

<!--begin::Sidebar-->
@include('./user/layout.sidebar')
<!--end::Sidebar-->

<!--begin::Content-->
<div class="content">
    <!--begin::Header-->
    <div class="header-ui d-flex item-center w-100">
        <div class="header__right d-flex flex-grow-1 align-items-center">
            <span class="bars"></span>
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Main Content-->
    <div class="main-content">
        @yield('content')
    </div>
    <!--end::Main Content-->

</div>

</body>

</html>
