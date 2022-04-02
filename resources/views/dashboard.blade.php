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

    </div>


    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
