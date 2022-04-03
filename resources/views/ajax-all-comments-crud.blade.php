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

        <div class="col-md-12 card-header font-weight-bold">

            <div class="col-md-12 card-header text-center font-weight-bold">

                <h2>Results</h2>
            </div>
            <table id="Table1" class="table" style="width:100%">
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
                    @foreach ($results as $result)
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>{{ $result->comment_id }}</td>
                        <td class={{$result->style == 'p' ? 'positive' : ''}}>{{ $result->comment_name }}</td>
                        <td>{{ $result->forename . " " . $result->surname }} </td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="col-md-12 card-header text-center font-weight-bold">

                <h2>Terminology</h2>
            </div>

            <table id="Table1" class="table" style="width:100%">
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
                    @foreach ($terminology as $terminologies)
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>{{ $terminologies->comment_id }}</td>
                        <td class={{$terminologies->style == 'p' ? 'positive' : ''}}>{{ $terminologies->comment_name }}</td>
                        <td>{{ $terminologies->forename . " " . $terminologies->surname }} </td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        @include('comment-section')

        <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
