
<?php echo $__env->make('frontEnd.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>

	
	<style>
	.dropdown-menu a:hover {background-color: #ddd;}

	.dropdown:hover .dropdown-menu {display: block;}

	.dropdown:hover .dropbtn {background-color: ;}
</style>

	<!-- banner -->
	<div class="main_section_agile">

		<div class="agileits_w3layouts_banner_nav">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1><a class="navbar-brand" href="/"><i>GB</i><span>Library</span></a></h1>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu--iris">
						<ul class="nav navbar-nav menu__list">
							<li class="menu__item "><a href="/" class="menu__link">Home</a></li>
							<li class="menu__item"><a href="#" class="menu__link">Services</a></li>
							<li class="menu__item"><a href="#" class="menu__link">Gallery</a></li>

							<li class="dropdown menu__item">
								<a href="#" class="dropdown-toggle menu__link dropbtn" data-toggle="dropdown">Repositories <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a href="#">e-Journals</a></li>
									<li><a href="#">e-Books</a></li>
									<li><a href="#">e-Thesis</a></li>
									<li><a href="#">e-News Clipping</a></li>
									<li><a href="typography.html">Faculty Resource</a></li>
								</ul>
							</li>
							<li class="menu__item"><a href="#" class="menu__link">About Us</a></li>


							<?php if(!Auth::check()): ?>

									<li class="menu__item"><a class="menu__link" href="" data-toggle="modal" data-target="#myModal2"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a> </li>
									<li class="menu__item"><a class="menu__link" href="" data-toggle="modal" data-target="#myModal3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Register</a> </li>




							<?php else: ?>
								<li class="menu__item">
									<form  action="<?php echo e(route('logout')); ?>" method="POST">
										<?php echo e(csrf_field()); ?>

										<button type="submit"><b>Logout</b></button>
									</form>
								</li>
							<?php endif; ?>

						</ul>

						<!-- <div class="w3_agileits_search">
						<form action="#" method="post">
						<input type="search" name="Search" placeholder="Search here..." ="">
						<input type="submit" value=" ">
					</form>
				</div> -->
			</nav>
		</div>
	</nav>
</div>
</div>
<!-- banner -->
<div class="banner-silder">
	<div id="JiSlider" class="jislider">
		<ul>
			<li>
				<div class="w3layouts-banner-top">

					<div class="container">
						<!-- <div class="agileits-banner-info">
						<span>Education</span>
						<h3>For the Creatives</h3>
						<p>You can learn anything</p>

					</div> -->
				</div>
			</div>
		</li>
		<li>
			<div class="w3layouts-banner-top w3layouts-banner-top1">
				<div class="container">
					<!-- <div class="agileits-banner-info">
					<span>Free</span>
					<h3>Premium Courses</h3>
					<p>You only have to know one thing</p>

				</div> -->
			</div>
		</div>
	</li>
	<li>
		<div class="w3layouts-banner-top w3layouts-banner-top2">
			<div class="container">
				<!-- <div class="agileits-banner-info">
				<span>Education</span>
				<h3>For the Creatives</h3>
				<p>You can learn anything.</p>

			</div> -->

		</div>
	</div>
</li>

</ul>
</div>
</div>

<!-- //banner -->
<!-- Modal1 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<div class="signin-form profile">
					<h3 class="agileinfo_sign">Login</h3>
					<div class="login-form">
						<form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
							<?php echo e(csrf_field()); ?>


							<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">


								<div>
									<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"  autofocus placeholder="E-Mail Address">

									<?php if($errors->has('email')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('email')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">


								<div>
									<input id="password" type="password" class="form-control" name="password"  placeholder="Password">

									<?php if($errors->has('password')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('password')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">
								<div>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
										</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="tp">
									<input type="submit" name="login" value="login">

									<a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
										Forgot Your Password?
									</a>
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- //Modal1 -->
<!-- Modal2 -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<div class="signin-form profile">
					<h3 class="agileinfo_sign">Registration</h3>
					<div class="login-form">
						<form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">


                                <div>
                                    <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>"  autofocus placeholder="Name">

                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">


                                <div>
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"  placeholder="E-Mail Address">

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">


                                <div>
                                    <input id="password" type="password" class="form-control" name="password"  placeholder="Password">

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">


                                <div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="form-group">


                                <div>
                                    <input id="" type="file" class="form-control" name="avatar" placeholder="Avatar">

                                <?php if($errors->has('avatar')): ?>
                                    <span class="help-block">
                                        <strong style="color:#a94442"><?php echo e($errors->first('avatar')); ?></strong>
                                    </span>
                                <?php else: ?>
                                    <span class="help-block">
                                        Profile Image
                                    </span>
                                <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">


                                <div>
                                    <input id="" type="file" class="form-control" name="identity" placeholder="Identity">

                                <?php if($errors->has('identity')): ?>
                                    <span class="help-block">
                                        <strong style="color:#a94442"><?php echo e($errors->first('identity')); ?></strong>
                                    </span>
                                <?php else: ?>
                                    <span class="help-block">
                                        ID CARD
                                    </span>
                                <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">Registered As</label>

                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" value="1" name="reg_as" checked>Teacher
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="0" name="reg_as">Student
                                    </label>
                                </div>

                            </div>





                            <div class="form-group">
                                <div class="tp">
                                    <input type="submit" name="register" value="register">
                                </div>
                            </div>
                        </form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- //Modal2 -->

<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<section>
				<div class="modal-body">
					<h5>Mastering</h5>
					<img src="images/2.jpg" alt=" " class="img-responsive" />
					<p>Ut enim ad minima veniam, quis nostrum
						exercitationem ullam corporis suscipit laboriosam,
						nisi ut aliquid ex ea commodi consequatur? Quis autem
						vel eum iure reprehenderit qui in ea voluptate velit
						e.
						<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit
							esse quam nihil molestiae consequatur.</i></p>
						</div>
					</section>
				</div>
			</div>
		</div>
		<!-- //bootstrap-pop-up -->
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

	<!-- services -->

	<!-- //services -->

	<!-- blog -->
	<div class="blog" id="blog">
		<div class="container">

			<h3 class="w3l_header w3_agileits_header"> Latest <span>  News</span></h3>
			<div class="agile_inner_w3ls-grids">

				<div class="col-sm-6 w3-agile-post-grids">
					<div class="w3-agile-post-img w3-agile-post-img1">
						<a href="#" data-toggle="modal" data-target="#myModal">
							<ul>
								<li><i class="fa fa-comments" aria-hidden="true"></i> 05</li>
								<li><i class="fa fa-heart" aria-hidden="true"></i> 874</li>
								<li><i class="fa fa-share" aria-hidden="true"></i> Share</li>
							</ul>
						</a>
					</div>
					<div class="w3-agile-post-info">
						<h4><a href="#" data-toggle="modal" data-target="#myModal">Quisque a rhoncus</a></h4>
						<ul>
							<li>By <a href="#">Admin</a></li>
							<li>Jan 28th,2017</li>
						</ul>
						<p>Suspendisse in nisl at ipsum molestie dignissim. Pellentesque est nisi, blandit eget aliquam sed, consequat nec risus.</p>
					</div>
				</div>
				<div class="col-sm-6 w3-agile-post-grids">
					<div class="w3-agile-post-img w3-agile-post-img2">
						<a href="#" data-toggle="modal" data-target="#myModal">
							<ul>
								<li><i class="fa fa-comments" aria-hidden="true"></i> 21</li>
								<li><i class="fa fa-heart" aria-hidden="true"></i> 287</li>
								<li><i class="fa fa-share" aria-hidden="true"></i> Share</li>
							</ul>
						</a>
					</div>
					<div class="w3-agile-post-info">
						<h4><a href="#" data-toggle="modal" data-target="#myModal">Quisque a rhoncus</a></h4>
						<ul>
							<li>By <a href="#">Admin</a></li>
							<li>Feb 24th,2017</li>
						</ul>
						<p>Suspendisse in nisl at ipsum molestie dignissim. Pellentesque est nisi, blandit eget aliquam sed, consequat nec risus.</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //blog -->
	<!-- stats -->

	<!-- //stats -->

	<!-- testimonials -->

	<!-- //testimonials -->

	<!-- footer -->
	<div class="footer">
		<div class="f-bg-w3l">
			<div class="container">
				<div class="col-md-4 w3layouts_footer_grid">
					<h2>Follow <span>Us</span></h2>
					<ul class="social_agileinfo">
						<li><a href="#" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#" class="w3_google"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
				<div class="col-md-4 w3layouts_footer_grid">

					<h2>Quick <span>Links</span></h2>

					<ul>
						<li><a href="#">Library News</a></li>
						<li><a href="#">History</a></li>
						<li><a href="#">Meet Our Staff</a></li>
						<li><a href="#">Board of Trustees</a></li>
						<li><a href="#">Budget</a></li>
						<li><a href="#">Annual Report</a></li>
					</ul>




				</div>
				<div class="col-md-4 w3layouts_footer_grid">
					<h2>About <span>Library</span></h2>
					<p>
						It is a long established fact that a reader will be distracted by the readable content of a page when looking.
					</p>

					<div class="fa fa-location-arrow">

						<p>Nolam, P.O. Mirzanagar via Savar Cantonment,
							Ashulia, Savar, Dhaka-1344.</p>
						</div>
						<div class="fa fa-envelope">

							<a href="mailto:support@libraria.com">admin@gonouniversity.edu.bd</a>
						</div>
						<div class="fa fa-phone">

							<a href="tel:012-345-6789">+ 012-345-6789</a>
						</div>


					</div>




				</div>
				<div class="col-md-12 w3layouts_footer_grid text-center">
					<p>© 2018 GONO LIBRARY. All Rights Reserved | Design by <a href="http://tarifhossaintony.000webhostapp.com/" target="_blank">Engineers</a></p>
				</div>
			</div>



			<div class="clearfix"> </div>




		</div>
	</div>
</div>

<?php echo $__env->make('frontEnd.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
