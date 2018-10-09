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
			<tbody>
				@if ($book)
					<tr>
						<td width="10px">Name</td>
						<td width="10px">:</td>
						<td width="10px">{{ $book->title }}</td>
					</tr>
					<tr>
						<td width="10px">Author</td>
						<td width="10px">:</td>
						<td width="10px" >{{ $book->author }}</td>
					</tr>
					<tr>
						<td width="10px">Edition</td>
						<td width="10px">:</td>
						<td width="10px" >{{ $book->edition }}</td>
					</tr>
					<tr>
						<td width="10px">Availabilty</td>
						<td width="10px">:</td>
						<td>
							@if ($book->quantity - $book->issues->count() > 0)
								<p class="text-primary">Available</p>
							@else
								<p class="text-danger">Unavailable</p>
							@endif
						</td>
					</tr>
					<tr>
						<td width="10px">Session</td>
						<td width="10px">:</td>
						<td width="10px" >{{ $book->session }}</td>
					</tr>
					<tr>
						<td width="10px">Image</td>
						<td width="10px">:</td>
						<td width="10px" >
							<img width="150px" src="{{ $book->image }}" alt="">
						</td>
					</tr>
				@endif
			</tbody>
		</table>

	</div>



</div>


</div>
<!-- //banner-bottom -->

@endsection
