<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <link rel="stylesheet" href="{{ mix('css/app.css') }}">

            <title>{{ config('app.name', 'CMMS') }}</title>
            <style>
                body {
                    margin-bottom: 6.5rem;
                }
            </style>
    </head>
    <body class="font-sans antialiased text-black leading-tight">
            @include('partials.header')

            <div id="app" class="container mx-auto">
                @yield('body')
            </div>

            @include('partials.footer')
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
