<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARAVEL LIFT</title>

    <link rel="stylesheet" href="{{asset('assets')}}/bootstrap/css/bootstrap.min.css">
    @livewireStyles
    @stack('styles')
</head>
<body>
    <div class="mt-5">
       {{ $slot }}
    </div>
    <script src="{{asset('assets')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets')}}/bootstrap/js/jquery.slim.min.js"></script>
    @stack('scripts')
    @livewireScripts
</body>
</html>
