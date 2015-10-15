<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AbeomeHD</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/all.css">
</head>
<body>
    @include('nav')

    <div class="container">
        @yield('content')
    </div>

    <script src="/js/all.js"></script>
    @yield('scripts')
</body>
</html>