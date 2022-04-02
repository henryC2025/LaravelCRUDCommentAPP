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
        <div class="textareaSection">


            <?php
            if(isset($_POST['submit'])){
            $name=$_POST["name"];
            }?>

            <form action="comment-message" class="text-center mt-5">
                <button class="btn deselectall-button" type="button" id="toggle-button">Deselect All</button>
                <button class="btn selectall-button" type="button" id="toggle-button">Select All</button>
                <input class="btn" id="btnGet" type="button" value="Get Selected" />
                <button class="btn" type="button" id="copy">Copy</button>
                <input class="btn" type="submit" value="Submit" name="submit">
                <br>
                <textarea class="mb-5 mt-2" id="message" rows="10" cols="100" name="message-comment"></textarea>
                {{-- Enter name<input type="textarea" name="name"> --}}
            </form>


            {{-- <textarea id="message" rows="10" cols="100">Selection</textarea><button type="button" id="copy">Copy</button>
            <button onclick="document.location='/comment-message'">Comment Message</button></div> --}}
        </div>

        @include('bootstrap-model')

        <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
