<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.meta')

    @include('layouts.css.student_css')
</head>

<body>
    @include('layouts.navigation')



    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    @include('layouts.footer')

    @include('layouts.js.student_js')
</body>

</html>
