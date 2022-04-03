<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment Application</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

</head>
<body>

    @include('header')
    <div class="container mt-2">

        @include('navigation')

        <div class="col-md-12 card-header text-center ">

            <h1 class="add-comment-title">{{str_contains((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", 'result') ? 'Results' : 'Terminology'}} Comments</h1>

        </div>

        <div class="row">

            <!-- main section table --->
            @yield('main')

        </div>

        @include('comment-section')

        @include('bootstrap-model')

        <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
