@extends('layouts.frontEnd')

@section('content')

<!-- banner -->
<div class="banner-silder">
	<div id="JiSlider" class="jislider">
		<ul>
			<li>
				<div class="w3layouts-banner-top">

					<div class="container">

					</div>
				</div>
			</li>
			<li>
				<div class="w3layouts-banner-top w3layouts-banner-top1">
					<div class="container">

					</div>
				</div>
			</li>
			<li>
				<div class="w3layouts-banner-top w3layouts-banner-top2">
					<div class="container">

					</div>
				</div>
			</li>

		</ul>
	</div>
</div>

<!-- banner-bottom -->
<div class="banner-bottom">
	<div class="container">
		<div class="filter-box">
			<h3>What are you looking for at the library?</h3>
			<form action="#" method="get">
				<div class="col-md-4 col-sm-6">
					<div class="form-group">
						<label class="sr-only" for="keywords">Search by Keyword</label>
						<input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text">
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<select name="catalog" id="catalog" class="form-control">
							<option>Search the Catalog</option>
							<option>Catalog 01</option>
							<option>Catalog 02</option>
							<option>Catalog 03</option>
							<option>Catalog 04</option>
							<option>Catalog 05</option>
						</select>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<select name="category" id="category" class="form-control">
							<option>All Categories</option>
							<option>Category 01</option>
							<option>Category 02</option>
							<option>Category 03</option>
							<option>Category 04</option>
							<option>Category 05</option>
						</select>
					</div>
				</div>
				<div class="col-md-2 col-sm-6">
					<div class="form-group">
						<input class="form-control" type="submit" value="Search">
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
</div>
<!-- //banner-bottom -->

@endsection
