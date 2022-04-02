@extends('comment-base')
@section('main')

<div class="col-md-12">
    <div class="container">
        <table id="TableTerminology" class="center" style="width:20%">
            <td><button type="button" id="addNewComment" class="btn btn-success addBtn">➕</button></td>
        </table>
    </div>
    <table id="TableTerminology" class="table" style="width:100%">
        <thead>
            <tr>
                <th scope="col" style="width:10%">#</th>
                <th scope="col" style="width:15%">Comment Code</th>
                <th scope="col" style="width:55%">Comment</th>
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
                <td>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $terminology->links('pagination::bootstrap-4') !!}
    </div>
</div>

@endsection
