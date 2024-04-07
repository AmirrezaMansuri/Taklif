<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.head')
    <title>@yield('title')</title>
    @yield('style')
</head>
<body>
    @include('admin.layout.nav')

    @yield('body')

    @include('admin.layout.footer')

    @yield('end')
</body>
</html>