<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.css.admin_css')
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            @include('layouts.navbars.admin_top_nav')
        </nav>

        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">

                @include('layouts.navbars.admin_sidebar')
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('main')
                </div>
            </div>
        </div>
    </div>
    @include('layouts.js.admin_script')
</body>

</html>
