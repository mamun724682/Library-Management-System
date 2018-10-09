@extends('layouts.frontEnd')

@section('content')

<!-- banner -->
<div class="banner-bottom">
	<div class="container">
		<div class="filter-box">
			<h3>What are you looking for at the library?</h3>
			<form action="{{ route('book.search') }}" method="get">
				<div class="col-md-4 col-sm-6">
					<div class="form-group">
						<label class="sr-only" for="keywords">Search by Keyword</label>
						<input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text">
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="form-group">
						<select name="catalog" id="catalog" class="form-control">
							<option>Search the Catalog</option>
							<option value="title">Title</option>
							<option value="author">Author</option>
							<option value="isbn">ISBN</option>
							<option value="language">Language</option>
						</select>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<input class="form-control" type="submit" value="Search">
					</div>
				</div>
			</form>
		</div>

		<table class="table">
			<thead>
				<th>Title</th>
				<th>Author</th>
				<th>Edition</th>
				<th>Session</th>
				<th>Image</th>
			</thead>
			<tbody>
				@if ($books->count())
					@foreach ($books as $book)
						<tr>
							<td width="20%"><a href="{{ route('book.detail',$book->id) }}" style="color:black">{{ $book->title }}</a></td>
							<td width="20%" >{{ $book->author }}</td>
							<td width="20%" >{{ $book->edition }}</td>
							<td width="20%" >{{ $book->session }}</td>
							<td width="20%" >
								<img width="250px" src="{{ $book->image }}" alt="">
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="5" style="text-align:center" class="blink_me"><span style="color:red">NO BOOKS FOUND</span></td>
					</tr>
				@endif
			</tbody>
		</table>

	</div>



</div>


</div>
<!-- //banner-bottom -->

@endsection
