<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    {{-- add font awesome --}}
    <script src="https://kit.fontawesome.com/7a249e95a6.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    {{-- inertia js --}}
    @vite('resources/js/app.js')
    {{-- tailwind css --}}
    @vite('resources/css/app.css')
    @inertiaHead
</head>

<body>
    @inertia
</body>

</html>
