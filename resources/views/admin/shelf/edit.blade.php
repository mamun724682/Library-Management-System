@extends('layouts.app')

@section('content')

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h5>Edit Tag</h5>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="{{ route('tag.update',$tag->id) }}" method="post">
        {{ csrf_field() }}  {{ method_field('put') }}

        {{-- @include('includes.errors')
        @include('includes.message') --}}

        <div class="form-group">
          <label class="control-label col-sm-3" for="">Tag</label>
          <div class="col-sm-6">
            <input class="form-control" type="text" name="tag" value="{{ $tag->tag }}">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for=""></label>
          <div class="col-sm-6">
            <input class="btn btn-sm btn-primary pull-right" type="submit" name="submit" value="Update Tag ">
          </div>
        </div>

      </form>
    </div>
  </div>

@endsection
