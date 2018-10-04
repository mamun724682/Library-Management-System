@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Books Issued
                    <span class="badge bg-info">{{ $issue_books->count() }}</span>
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <th>Serial No.</th>
                            <th>Book Title</th>
                            <th>User</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Fine</th>
                            <th>Action</th>
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
                                        <td>{{ $book->return_date }}</td>
                                        <td>{{ $book->status? 'Returned' : 'Pending' }}</td>
                                        <td>
                                            @if ($book->fine)
                                                {{ $book->fine->fine }} TK
                                                @else
                                                    No Fine
                                            @endif
                                        </td>
                                        <td>
                                            @if (!$book->status)
                                                <a href="{{ route('book.return',$book->id) }}" class="btn btn-xs btn-primary">Returned</a>
                                            @else
                                                <a href="{{ route('book.pending',$book->id) }}" class="btn btn-xs btn-danger">Pending</a>
                                            @endif

                                            {{-- <form class="" action="{{ route('books.destroy', $book->id) }}" method="post">
                                                {{ csrf_field() }} {{ method_field('delete') }}
                                                <a class="btn btn-xs btn-info" href="{{ route('books.edit', $book->id) }}">Edit</a>
                                                <a class="btn btn-xs btn-success" href="{{ route('books.show', $book->id) }}">View</a>
                                                <input class="btn btn-xs btn-danger" type="submit" name="" value="Delete">
                                            </form> --}}
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
