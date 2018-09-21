@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Book Selves</b></div>
                <div class="pull-right">
                    <div class="col-sm-12">
                        <br>
                        <a href="{{ route('shelves.create') }}" class="btn btn-primary">Add new shelf</a>
                    </div>
                </div>

                <div class="panel-body">
                  <table class="table datatable table-bordered">
                    <thead>
                      <th>Serial</th>
                      <th>Self</th>
                      <th>Published</th>
                      <th>Action</th>
                    </thead>

                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @if ($shelves)
                                @foreach ($shelves as $shelf)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><a href="{{ route('shelf.books', $shelf->id) }}" style="text-decoration: none;">{{ $shelf->name }}</a></td>
                                    <td>{{ $shelf->created_at->diffForHumans() }}</td>
                                    <td>
                                      <form class="" action="{{ route('shelves.destroy',  $shelf->id) }}" method="post">
                                        {{ csrf_field() }} {{ method_field('delete') }}
                                        <a class="btn btn-primary" href="{{ route('shelves.edit',  $shelf->id) }}">Edit</a>
                                        <input class="btn btn-danger" type="submit" name="" value="Delete">
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
