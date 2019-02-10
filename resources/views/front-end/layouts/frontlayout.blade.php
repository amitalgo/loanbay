<!DOCTYPE html>

<html lang="en">
<head>
    @include('front-end.include.head')
</head>

<body>
<div class="site-wrap">

    @include('front-end.include.header')

    @yield('content')

    @include('front-end.include.footer')
</div>

@include('front-end.include.jsLib')
@stack('scripts')

</body>

</html>

