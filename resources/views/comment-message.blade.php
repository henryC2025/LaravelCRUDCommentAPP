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
    <div class="mt-2 mb-10">

        @include('navigation')

        <div class="row textareaSection">
            <div class="col-md-12 card-header text-center submitted-comment mt-50">
                <p class="comment-header">Copy and Paste these comments:</>
                </p>

                <button class="btn text-center btn col-md-12 " onclick="history.back()">Go Back</button>
                <textarea class="mt-1" id="message" rows="10" cols="100" name="message-comment">Here are your comments: &#13;&#10;<?php echo str_replace('⚫', '', $_GET["message-comment"]) ?></textarea>

                <button class="text-center btn col-md-12 commentSection" type="button" id="copy">Copy</button>
            </div>
        </div>


    </div>

    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
