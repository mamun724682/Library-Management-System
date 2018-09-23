@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">User</div>

                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <th>Serial No.</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Session</th>
                            <th>Status</th>
                        </thead>

                        <tbody>

                            @php
                                $i=1;
                            @endphp
                            @if ($books)
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->category->name }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->edition }}</td>
                                        <td>{{ $book->session }}</td>
                                        <td>
                                            @if ($book->quantity - $book->issues->count() > 0)
                                                <p class="text-primary">Available</p>
                                            @else
                                                <p class="text-danger">Unavailable</p>
                                            @endif
                                        </td>
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
