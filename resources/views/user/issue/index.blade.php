@extends('layouts.admin')

@section('content')

<style media="screen">
.blink_me {
    background: red;
    animation: blinker 2s linear infinite;
}

@keyframes blinker {
    50% {
        opacity: 0;
    }
}
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Issue Books</div>

                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <th>Serial No.</th>
                            <th>Book Title</th>
                            <th>User</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                        </thead>

                        <tbody>

                            @php
                            $i=1;
                            @endphp
                            @if ($issue_books)
                                @foreach ($issue_books as $book)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $book->book->title }}</td>
                                        <td>{{ $book->user->name }}</td>
                                        <td>{{ $book->issue_date }}</td>
                                        <td  @if (!$book->status)
                                                @if (date('Y-m-d') == $book->return_date || date('Y-m-d') > $book->return_date)
                                                    class="blink_me"
                                                @endif
                                        @endif >{{ $book->return_date }}</td>
                                        <td>{{ $book->status? 'Returned' : 'Pending' }}</td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
