@extends('layouts.admin')

@section('content')

    {{-- blinker --}}
    @include('includes.blinker')


    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1 class="" style="text-align:center;">Welcome {{ Auth::user()->name }}</h1>
                    @if (Auth::user()->is_admin)

                        <div class="col-md-12" style="padding: 20px;">
                            <div class="col-md-4">

                                <!-- START WIDGET REGISTRED -->
                                <div class="widget widget-default widget-item-icon" >
                                    <div class="widget-item-left">
                                        <span class="fa fa-user"></span>
                                    </div>
                                    <div class="widget-data">
                                        <div class="widget-int num-count">{{ $user_count }}</div>
                                        <div class="widget-title">
                                            <a style="text-decoration:none; color:#434a54;" href="{{ route('users.index') }}">Registered users</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET REGISTRED -->

                            </div>

                            <div class="col-md-4">
                                <!-- START WIDGET REGISTRED -->
                                <div class="widget widget-default widget-item-icon">
                                    <div class="widget-item-left">
                                        <span class="fa fa-book"></span>
                                    </div>
                                    <div class="widget-data">
                                        <div class="widget-int num-count">{{ $book_count }}</div>
                                        <div class="widget-title">
                                            <a style="text-decoration:none; color:#434a54;" href="{{ route('books.index') }}">Books in Library</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET REGISTRED -->

                            </div>
                            <div class="col-md-4">
                                <!-- START WIDGET REGISTRED -->
                                <div class="widget widget-default widget-item-icon">
                                    <div class="widget-item-left">
                                        <span class="fa fa-tasks"></span>
                                    </div>
                                    <div class="widget-data">
                                        <div class="widget-int num-count">{{ $category_count }}</div>
                                        <div class="widget-title">
                                            <a style="text-decoration:none; color:#434a54;" href="{{ route('category.index') }}">Categories</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET REGISTRED -->

                            </div>
                        </div>

                        <div class="col-md-12" style="padding: 20px;">


                            <div class="col-md-4">
                                <!-- START WIDGET REGISTRED -->
                                <div class="widget widget-default widget-item-icon">
                                    <div class="widget-item-left">
                                        <span class="fa fa-database"></span>
                                    </div>
                                    <div class="widget-data">
                                        <div class="widget-int num-count">{{ $shelf_count }}</div>
                                        <div class="widget-title">
                                            <a style="text-decoration:none; color:#434a54;" href="{{ route('shelves.index') }}">Shelves in Library</a>

                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET REGISTRED -->

                            </div>



                            <div class="col-md-4">
                                <!-- START WIDGET REGISTRED -->
                                <div class="widget widget-default widget-item-icon">
                                    <div class="widget-item-left">
                                        <span class="fa fa-thumb-tack"></span>
                                    </div>
                                    <div class="widget-data">
                                        <div class="widget-int num-count">{{ $issued_count }}</div>
                                        <div class="widget-title">
                                            <a style="text-decoration:none; color:#434a54;" href="{{ route('issue.index') }}">Books Issued</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET REGISTRED -->

                            </div>

                            <div class="col-md-4">
                                <!-- START WIDGET REGISTRED -->
                                <div class="widget widget-default widget-item-icon" >
                                    <div class="widget-item-left">
                                        <span class="fa fa-archive"></span>
                                    </div>
                                    <div class="widget-data">
                                        <div class="widget-int num-count">{{ $returned_count }}</div>
                                        <div class="widget-title">
                                            <a style="text-decoration:none; color:#434a54;" href="{{ route('issue.returned') }}">Books Returnd</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET REGISTRED -->

                            </div>
                        </div>


                    @else


                        @if ($issueBooks)

                            <div class="col-md-12" style="padding: 20px;">
                                <div class="col-md-3" style="border: 2px solid gray">
                                    <!-- START WIDGET REGISTRED -->
                                    <div class="widget widget-default widget-item-icon">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <h4 class="text-success">Pending Books</h4>
                                            <ul class="list-group ">
                                                @if (count($issueBooks))
                                                    @foreach ($issueBooks as $book)
                                                        <li class="list-group-item">
                                                            {{ $book->book->title }} book | <span @if (date('Y-m-d') == $book->return_date || date('Y-m-d') > $book->return_date)
                                                                class="blink_me "
                                                            @endif>Dateline : {{ $book->return_date }}</span>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <h4>No Book issued :)</h4>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- END WIDGET REGISTRED -->
                                </div>
                                <div class="col-md-1"></div>

                                @if (count($issueBooks))
                                    <div class="col-md-5" style="border: 2px solid gray">
                                        <!-- START WIDGET REGISTRED -->
                                        <div class="widget widget-default widget-item-icon">
                                            <div class="widget-item-left">
                                                <span class="fa fa-warning blink_me" style="font-size:48px;color:red"></span>
                                            </div>
                                            <div class="widget-data">
                                                <div class="col-sm-12">
                                                    <h4 class="text-warning">Warning Message</h4>
                                                    <ul class="list-group ">
                                                        @foreach ($issueBooks as $book)
                                                            @if (date('Y-m-d') == $book->return_date || date('Y-m-d') > $book->return_date)
                                                                <li class="list-group-item">
                                                                    {{ $book->book->title }} book | <span class="blink_me">
                                                                        Dateline over!<br>
                                                                        Kindly return this book Otherwise you will be charged 1tk/day. <br>
                                                                    </span>
                                                                    {{-- Total charged : {{ date_diff(date_create($book->return_date), date_create(date('Y-m-d')))->format('%a TK') }} --}}
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET REGISTRED -->
                                    </div>
                                </div>

                                <div class="col-md-12" style="padding: 20px;">
                                    <div class="col-md-5" style="border: 2px solid gray">
                                        <!-- START WIDGET REGISTRED -->
                                        <div class="widget widget-default widget-item-icon">
                                            <div class="widget-item-left">
                                                <span class="fa fa-try"></span>
                                            </div>
                                            <div class="widget-data">
                                                <div class="col-sm-12">
                                                    <h4 class="text-success">Fine Books</h4>
                                                    <ul class="list-group ">
                                                        @php
                                                        $total_fine=0;
                                                        @endphp

                                                        @if (count($fines))
                                                            @foreach ($fines as $fine)
                                                                <li class="list-group-item">
                                                                    {{ $fine->issuBook->book->title }}
                                                                    book | <span class="blink_me ">Fine : {{ $fine->fine }} TK</span>
                                                                </li>
                                                                @php
                                                                $total_fine += $fine->fine
                                                                @endphp
                                                            @endforeach
                                                        @else
                                                            <h4>No Book fined :)</h4>
                                                        @endif
                                                    </ul>
                                                    <div style="padding-top: 15px" class="pull-right">
                                                        <strong>Total Fine: {{ $total_fine }} TK</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET REGISTRED -->
                                    </div>
                                </div>
                            @endif


                        @endif
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection
