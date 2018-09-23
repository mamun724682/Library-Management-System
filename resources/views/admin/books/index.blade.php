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
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Session</th>
                            <th>Category</th>
                            <th>Shelf</th>
                            <th>Availabilty</th>
                            <th>Issue Book</th>
                            <th>Action</th>
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
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->edition }}</td>
                                        <td>{{ $book->session }}</td>
                                        <td><a href="{{ route('category.books', $book->id) }}">{{ $book->category->name }}</a></td>
                                        <td><a href="{{ route('shelf.books', $book->id) }}">{{ $book->shelf->name }}</a></td>
                                        <td>{{ $book->issues->count() ? $book->quantity - $book->issues->count(): $book->quantity }}</td>
                                        <td>
                                            <a href="{{ route('book.issue', $book->id) }}" class="btn btn-xs btn-info">Issue</a>
                                        </td>
                                        <td>
                                            <form class="" action="{{ route('books.destroy', $book->id) }}" method="post">
                                                {{ csrf_field() }} {{ method_field('delete') }}
                                                <a class="btn btn-xs btn-info" href="{{ route('books.edit', $book->id) }}">Edit</a>
                                                <a class="btn btn-xs btn-success" href="{{ route('books.show', $book->id) }}">Details</a>
                                                <input class="btn btn-xs btn-danger" type="submit" name="" value="Delete">
                                            </form>
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
