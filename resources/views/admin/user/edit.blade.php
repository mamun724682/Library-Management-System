@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Avatar</label>

                            <div class="col-md-6">
                                <input id="" type="file" class="form-control" name="avatar" >

                            @if ($errors->has('avatar'))
                                <span class="help-block">
                                    <strong style="color:#a94442">{{ $errors->first('avatar') }}</strong>
                                </span>
                            @else
                                <p>Old Image</p>
                                <img width="100px" class="img-rounded" src="{{ asset('uploads/avatar/'. $user->avatar) }}" />
                                <span class="help-block">
                                    Only image supported
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Identity</label>

                            <div class="col-md-6">
                                <input id="" type="file" class="form-control" name="identity" >

                            @if ($errors->has('identity'))

                                <span class="help-block">
                                    <strong style="color:#a94442">{{ $errors->first('identity') }}</strong>
                                </span>
                            @else
                                <p>Old Image</p>
                                <img width="100px" class="img-rounded" src="{{ asset('uploads/identity/'. $user->identity) }}" />
                                <span class="help-block">
                                    Only image supported
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Registered As</label>

                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" value="1" name="reg_as" @if ($user->reg_as == 1)
                                        checked
                                    @endif>Teacher
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="0" name="reg_as"  @if ($user->reg_as == 0)
                                        checked
                                    @endif>Student
                                </label>
                            </div>

                        </div>





                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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
