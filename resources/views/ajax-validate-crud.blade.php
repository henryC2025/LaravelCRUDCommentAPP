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

            <h1 class="add-comment-title">Validate Comments</h1>

        </div>

        <div class="col-md-12 card-header font-weight-bold">

            <div class="col-md-12 card-header text-center font-weight-bold">

                <h2>Validate Results</h2>
            </div>
            <table id="TableResults" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" style="width:10%"></th>
                        <th scope="col" style="width:15%">Comment Code</th>
                        <th scope="col" style="width:55%">Comment Description</th>
                        <th scope="col" style="width:15%">Created By</th>
                        <th scope="col" style="width:5%"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($results0 as $result)
                    <tr>
                        <td></td>
                        <td>{{ $result->comment_id }}</td>
                        <td result>{{ $result->comment_name }}</td>
                        <td>{{ $result->forename . " " . $result->surname }} </td>
                        <td>
                            <a href="javascript:void(0)" id="edit-button" class="btn btn-primary edit" data-id="{{ $result->id }}">Approve</a>
                            <a href="javascript:void(0)" id="delete-button" class="btn btn-primary delete" data-id="{{ $result->id }}">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="col-md-12 card-header text-center font-weight-bold">

                <h2>Validate Terminology</h2>
            </div>

            <table id="TableTerminology" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" style="width:10%"></th>
                        <th scope="col" style="width:15%">Comment Code</th>
                        <th scope="col" style="width:55%">Comment Description</th>
                        <th scope="col" style="width:15%">Created By</th>
                        <th scope="col" style="width:5%"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($terminology0 as $terminologies)
                    <tr>
                        <td></td>
                        <td>{{ $terminologies->comment_id }}</td>
                        <td terminologies>{{ $terminologies->comment_name }}</td>
                        <td>{{ $terminologies->forename . " " . $terminologies->surname }} </td>
                        <td>
                            <a href="javascript:void(0)" id="edit-button" class="btn btn-primary edit" data-id="{{ $terminologies->id }}">Approve</a>
                            <a href="javascript:void(0)" id="delete-button" class="btn btn-primary delete" data-id="{{ $terminologies->id }}">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        @include('bootstrap-model')


        <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
