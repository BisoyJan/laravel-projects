<!DOCTYPE html>
<html>

<head>
    <title>Laravel 11 Task List App</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">

    <h1 class="text-2xl mb-4">@yield('title')</h1>
    <div>
        @if (session()->has('success'))
            <p>{{ session('success') }}</p>
        @endif
        @yield('content')
    </div>

</body>

</html>
