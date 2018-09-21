@extends('layouts.admin')

@section('content')
<style media="screen">
.blink_me {
    color: red;
    font-weight: bold;
    animation: blinker 2s linear infinite;
}

@keyframes blinker {
    50% {
        opacity: 0;
    }
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                <h1 class="" style="padding-left: 620px;">Welcome {{ Auth::user()->name }}</h1>
                @if (Auth::user()->is_admin)
                <div class="col-md-12" style="padding: 40px;">
                    <div class="col-md-5">
                        <!-- START WIDGET REGISTRED -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='{{ route('users.index') }}'">
                            <div class="widget-item-left">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">{{ $user_count }}</div>
                                <div class="widget-title">Registered users</div>
                            </div>
                        </div>
                        <!-- END WIDGET REGISTRED -->

                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <!-- START WIDGET REGISTRED -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='{{ route('books.index') }}'">
                            <div class="widget-item-left">
                                <span class="fa fa-book"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">{{ $book_count }}</div>
                                <div class="widget-title">Books in Library</div>
                            </div>
                        </div>
                        <!-- END WIDGET REGISTRED -->

                    </div>
                </div>

                <div class="col-md-12" style="padding: 40px;">
                    <div class="col-md-5">
                        <!-- START WIDGET REGISTRED -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='{{ route('category.index') }}'">
                            <div class="widget-item-left">
                                <span class="fa fa-tasks"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">{{ $category_count }}</div>
                                <div class="widget-title">Categories</div>
                            </div>
                        </div>
                        <!-- END WIDGET REGISTRED -->

                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <!-- START WIDGET REGISTRED -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='{{ route('shelves.index') }}'">
                            <div class="widget-item-left">
                                <span class="fa fa-database"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">{{ $shelf_count }}</div>
                                <div class="widget-title">Shelves in Library</div>
                            </div>
                        </div>
                        <!-- END WIDGET REGISTRED -->

                    </div>
                </div>

                <div class="col-md-12" style="padding: 40px;padding-bottom: 80px;">
                    <div class="col-md-5">
                        <!-- START WIDGET REGISTRED -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='{{ route('issue.index') }}'">
                            <div class="widget-item-left">
                                <span class="fa fa-thumb-tack"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">{{ $issued_count }}</div>
                                <div class="widget-title">Books Issued</div>
                            </div>
                        </div>
                        <!-- END WIDGET REGISTRED -->

                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <!-- START WIDGET REGISTRED -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='{{ route('issue.returned') }}'">
                            <div class="widget-item-left">
                                <span class="fa fa-archive"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">{{ $returned_count }}</div>
                                <div class="widget-title">Books Returnd</div>
                            </div>
                        </div>
                        <!-- END WIDGET REGISTRED -->

                    </div>
                </div>

                @else
                @if ($issueBooks)

                <div class="col-md-5" style="border: 2px solid gray">
                    <!-- START WIDGET REGISTRED -->
                    <div class="widget widget-default">
                        <div class="widget-item-left">
                            <span class="fa fa-book"></span>
                        </div>
                        <div class="widget-data">
                            <div class="col-sm-12">
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

                    </div>
                    <!-- END WIDGET REGISTRED -->

                </div>

                <div class="col-md-1">

                </div>

                @if (count($issueBooks))
                    <div class="col-md-5" style="border: 2px solid gray">
                        <!-- START WIDGET REGISTRED -->
                        <div class="widget widget-default">
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
                                            Kindly return this book ASAP.Otherwise you will be charged.</span>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- END WIDGET REGISTRED -->

                    </div>
                @endif

                    @endif
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection
