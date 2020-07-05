<!DOCTYPE html>
<html lang="ru">
<head>
    <title>main - ГеймсМаркет</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/css/libs.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
            crossorigin="anonymous"></script>
</head>
<body>
<div class="main-wrapper">
    @include('layouts.header')
    <div class="middle">
        <div class="sidebar">
            @include('layouts.sidebar.categories')
            @include('layouts.sidebar.news')
        </div>
        @yield('content')
    </div>
    @include('layouts.footer')
</div>
<script src="/js/main.js"></script>
</body>
</html>