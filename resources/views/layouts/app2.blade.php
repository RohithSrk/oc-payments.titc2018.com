<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') . ' - Login' }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        body {
            background-color: #222;
        }
    </style>

</head>
<body>
@yield ('content')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
