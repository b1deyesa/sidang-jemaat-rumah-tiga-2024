<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/app.scss'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/4419d23bf4.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('{{ asset('img/pattern.jpg') }}');">
    <div class="display">
        <x-navbar/>
        {{ $slot }}
    </div>
</body>
</html>