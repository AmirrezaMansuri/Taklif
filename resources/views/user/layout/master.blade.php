<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.layout.head')
    <title>@yield('title')</title>
    @yield('style')
</head>
<body>
    @include('user.layout.nav')

    @yield('body')

    @include('user.layout.footer')

    @yield('end')
</body>
</html>