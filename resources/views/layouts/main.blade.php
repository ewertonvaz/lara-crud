<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.header')
    <main class="main-container">
        @yield('conteudo')
    </main>
    @include('layouts.footer')
</body>
</html>