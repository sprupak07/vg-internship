<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Rupak Sapkota" content="Rupak Sapkota Portfolio">
    <title>
        {{ config('app.name') }}
    </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
        rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito Sans', sans-serif;
            }
        </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @yield('content')


</body>

</html>
