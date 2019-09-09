<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
     @auth
     @include('inc.navbar')  
     @endauth
     
     
        @include('inc.messages')
    <div class ="container">
        
        <main class="py-4">

            @yield('content')
        </main>
    </div>
</body>
<footer class="page-footer font-small blue pt-4">
        <div class="footer-copyright text-center py-3">
                &copy; <?php echo date("Y"); ?> <strong>U.F.O</strong>

        </div>
</footer>
</html>
