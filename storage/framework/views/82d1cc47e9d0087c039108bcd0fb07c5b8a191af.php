<?php $__env->startSection('content'); ?>

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

			</u>
			</div>

		</div>
		<div class="banner-bottom">
			<div class="container">
				<div class="filter-box">
					<h3>What are you looking for at the library?</h3>
					<form action="<?php echo e(route('book.search')); ?>" method="get">
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
			</div>

		</div>


	</div>
	<!-- //banner-bottom -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontEnd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>