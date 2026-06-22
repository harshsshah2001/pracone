<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <!-- Common CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Page Specific CSS -->
    {{-- @stack('css') --}}
</head>
<body>

    @yield('content')

</body>
</html>