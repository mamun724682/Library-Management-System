@extends('layouts.admin')

@section('content')
<style media="screen">
.ronly{
    background-color: white !important;
    color: black !important;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2><strong>Issue Book </strong></h2></div>

                <div class="panel-body">

                    {{-- @include('includes.errors') --}}

                    <form class="form-horizontal" method="post" action="{{ route('issue.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('book_id') ? ' has-error' : '' }}">
                            <label for="book_id" class="col-md-4 control-label">Book Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control ronly" name="book_name" value="{{ $book->title }}" readonly>
                                <input type="text" name="book_id" value="{{ $book->id }}" hidden>

                                @if ($errors->has('book_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('book_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Enter Your Email</label>
                            <div class="col-md-6">
                                <input type="text" name="email" id="email" class="form-control" />
                                <span style="color:blue;"><b><small  id="show"</small></b> </span>
                            </div>

                            <span id="error_email"></span>
                        </div>
                        <div class="form-group{{ $errors->has('issue_date') ? ' has-error' : '' }}">
                            <label for="issue_date" class="col-md-4 control-label">Issue Date</label>

                            <div class="col-md-6">
                                <input id="issue_date" type="date" class="form-control" name="issue_date" value="{{ old('issue_date') }}" >

                                @if ($errors->has('issue_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('issue_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('return_date') ? ' has-error' : '' }}">
                            <label for="return_date" class="col-md-4 control-label">Return Book</label>

                            <div class="col-md-6">
                                <input id="return_date" type="date" class="form-control" name="return_date" value="{{ old('return_date') }}" >

                                @if ($errors->has('return_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('return_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="text" name="user_id" id="user_id" value="" hidden>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
@section('js')

    <script>
    $('#email').keyup(function(){
        var email = $(this).val();
        $.ajax({
            url:"{{ route('email_available.check') }}",
            method:"get",
            data:{email:email},
            success:function(result)
            {
                $('#show').html(result.name)
                $('#user_id').val(result.id)
            },
            error:function(result)
            {
                $('#show').html('No User found')
            }

        });
    });
    </script>


@endsection
