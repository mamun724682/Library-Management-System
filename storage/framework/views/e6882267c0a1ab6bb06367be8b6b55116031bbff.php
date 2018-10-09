<?php $__env->startSection('content'); ?>

<!-- banner -->
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

		<table class="table">
			<tbody>
				<?php if($book): ?>
					<tr>
						<td width="10px">Name</td>
						<td width="10px">:</td>
						<td width="10px"><?php echo e($book->title); ?></td>
					</tr>
					<tr>
						<td width="10px">Author</td>
						<td width="10px">:</td>
						<td width="10px" ><?php echo e($book->author); ?></td>
					</tr>
					<tr>
						<td width="10px">Edition</td>
						<td width="10px">:</td>
						<td width="10px" ><?php echo e($book->edition); ?></td>
					</tr>
					<tr>
						<td width="10px">Availabilty</td>
						<td width="10px">:</td>
						<td>
							<?php if($book->quantity - $book->issues->count() > 0): ?>
								<p class="text-primary">Available</p>
							<?php else: ?>
								<p class="text-danger">Unavailable</p>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td width="10px">Session</td>
						<td width="10px">:</td>
						<td width="10px" ><?php echo e($book->session); ?></td>
					</tr>
					<tr>
						<td width="10px">Image</td>
						<td width="10px">:</td>
						<td width="10px" >
							<img width="150px" src="<?php echo e($book->image); ?>" alt="">
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>

	</div>



</div>


</div>
<!-- //banner-bottom -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontEnd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>