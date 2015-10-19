<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AbeomeHD</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/all.css">
</head>
<body>
    @yield('styles')
    @include('nav')

    <div class="container">
        @yield('content')
    </div>


    <script src="/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    @yield('scripts')
</body>
</html>