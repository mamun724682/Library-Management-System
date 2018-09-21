@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2><strong>View Book </strong></h2></div>

                    <div class="panel-body">

                        <div class="col-md-8">
                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Book Title</label>

                                <div class="col-md-6">
                                    {{ $book->title }}
                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                                <label for="author" class="col-md-4 control-label">Book Author</label>

                                <div class="col-md-6">
                                    {{ $book->author }}
                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('edition') ? ' has-error' : '' }}">
                                <label for="edition" class="col-md-4 control-label">Book Edition</label>

                                <div class="col-md-6">
                                    {{ $book->edition }}
                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
                                <label for="session" class="col-md-4 control-label">Book Session</label>

                                <div class="col-md-6">
                                    {{ $book->session }}
                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="categories" class="col-md-4 control-label">Book Category</label>
                                <div class="col-md-6">
                                    {{ $book->category->name }} <a href="{{ route('category.books', $book->id) }}">-->More books in this category</a>
                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('page') ? ' has-error' : '' }}">
                                <label for="page" class="col-md-4 control-label">Book Page</label>

                                <div class="col-md-6">
                                    {{ $book->page }}
                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('publisher') ? ' has-error' : '' }}">
                                <label for="publisher" class="col-md-4 control-label">Book Publisher</label>

                                <div class="col-md-6">
                                    {{ $book->publisher }}
                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                                <label for="language" class="col-md-4 control-label">Book Language</label>

                                <div class="col-md-6">
                                    {{ $book->language }}
                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('isbn') ? ' has-error' : '' }}">
                                <label for="isbn" class="col-md-4 control-label">Book ISBN</label>

                                <div class="col-md-6">
                                    {{ $book->isbn }}
                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('purchase_date') ? ' has-error' : '' }}">
                                <label for="purchase_date" class="col-md-4 control-label">Book Purchase Date</label>

                                <div class="col-md-6">
                                    {{ $book->purchase_date }}
                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                <label for="quantity" class="col-md-4 control-label">Book Quantity</label>

                                <div class="col-md-6">
                                    {{ $book->quantity }}
                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">Book Price</label>

                                <div class="col-md-6">
                                    {{ $book->price }}
                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group{{ $errors->has('shelf_id') ? ' has-error' : '' }}">
                                <label for="shelves" class="col-md-4 control-label">Book Shelf</label>

                                <div class="col-md-6">
                                    {{ $book->shelf->name }} <a href="{{ route('shelf.books', $book->id) }}">-->More books in this shelf</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <div style="text-align: center" class="form-control">
                                        <label class="control-label"><b>Picture</b></label>
                                    </div> <br>
                                    <img class="img-thumbnail" src="{{ $book->image }}" alt="No Image" width="300px">
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
