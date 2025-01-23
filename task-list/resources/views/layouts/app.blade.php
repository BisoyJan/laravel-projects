<!DOCTYPE html>
<html>

<head>
    <title>Laravel 11 Task List App</title>
    @yield('styles')
</head>

<body>

    <h1>@yield('title')</h1>
    <div>
        @if (session()->has('success'))
            <p>{{ session('success') }}</p>
        @endif
        @yield('content')
    </div>

</body>

</html>
