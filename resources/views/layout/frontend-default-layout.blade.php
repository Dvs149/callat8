<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	@include('layout.frontend-partials.head')
	@yield('style')
</head>
<body>
<div id="wrap">
    @include('layout.frontend-partials.header')
    @if(\Request::is('/') || \Request::path() == 'order/create')
        @include('layout.frontend-partials.slider')
    @endif
    <div id="middle">
        @yield('content')
    </div>
    @include('layout.frontend-partials.footer')
</div>
@yield('script')
</body>
</html>