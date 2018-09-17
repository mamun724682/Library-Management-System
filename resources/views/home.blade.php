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
                    <h1>Welcome {{ Auth::user()->name }}</h1>
                    @if (Auth::user()->is_admin)
                        <div class="col-md-3">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">{{ $user_count }}</div>
                                    <div class="widget-title">Registred users</div>
                                    <div class="widget-subtitle">On your website</div>
                                </div>
                                <div class="widget-controls">
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>
                            <!-- END WIDGET REGISTRED -->

                        </div>

                    @else
                        @if ($issueBooks)

                            <div class="col-md-6" style="border: 2px solid gray">
                                <!-- START WIDGET REGISTRED -->
                                <div class="widget widget-default">
                                    <div class="widget-item-left">
                                        <span class="fa fa-book"></span>
                                    </div>
                                    <div class="widget-data">
                                        <div class="col-sm-12">
                                            <h4 class="text-success">Pending Books</h4>
                                            <ul class="list-group ">
                                                @foreach ($issueBooks as $book)
                                                    <li class="list-group-item">
                                                         {{ $book->book->title }} book | <span @if (date('Y-m-d') == $book->return_date || date('Y-m-d') > $book->return_date)
                                                            class="blink_me "
                                                        @endif>Dateline : {{ $book->return_date }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <!-- END WIDGET REGISTRED -->

                            </div>






                        @endif
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection
