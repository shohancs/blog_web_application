<?php 
	include "inc/header.php";
?>

	<div role="main" class="main">

		<!-- ########## START: TOP HEADING ########## -->
		<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
			<div class="container">
				<div class="row">

					<div class="col-md-12 align-self-center p-static order-2 text-center">

						<h1 class="text-dark font-weight-bold text-8">Large Image Right Sidebar</h1>
						<span class="sub-title text-dark">Check out our Latest News!</span>
					</div>

					<div class="col-md-12 align-self-center order-1">

						<ul class="breadcrumb d-block text-center">
							<li><a href="">Home</a></li>
							<li class="active">Blog</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- ########## END: TOP HEADING ########## -->

	</div>

	<div class="container py-4">

		<div class="row">
			<!-- ########## START: SIDE BAR ########## -->
			<div class="col-lg-3 order-lg-2">
				<?php include"inc/sidebar.php"; ?>
			</div>
			<!-- ########## END: SIDE BAR ########## -->

			<div class="col-lg-9 order-lg-1">
				<div class="blog-posts">

					<?php  

						if (isset($_GET['id'])) {
							$categoryId = $_GET['id'];
							$sql = "SELECT * FROM post WHERE category_id='$categoryId' AND status=1 ORDER BY post_id DESC";
							$postData = mysqli_query($db, $sql);
							$totalPostCount = mysqli_num_rows($postData);

							if ($totalPostCount == 0) { ?>
								<div class="alert alert-warning text-center" role="alert">
								  Oops! No Post Found in this Category. We will post soon. Thanks for being with us...
								</div>
							<?php }
							else{
								while( $row = mysqli_fetch_assoc($postData) ) {
								$post_id 		= $row['post_id'];
								$title 			= $row['title'];
								$post_desc 		= $row['post_desc'];
								$image 			= $row['image'];
								$category_id 	= $row['category_id'];
								$author_id 		= $row['author_id'];
								$tags 			= $row['tags'];
								$status 		= $row['status'];
								$post_date 		= $row['post_date'];
								?>

									<article class="post post-large">
										<div class="post-image">
											<a href="details.php?dId=<?php echo $post_id; ?>">
												<?php 
													if (!empty($image)) {
														echo '<img src="admin/assets/images/posts/' . $image . '" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="'. $title .'">';
													}
													else {
														echo '<img src="img/blog/wide/blog-11.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />';
													}
												?>
												
											</a>
										</div>
									
										<div class="post-date">
											<!-- <span class="day">10</span> -->
											<span class="month"><?php echo $post_date; ?></span>
										</div>
									
										<div class="post-content">
									
											<h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a href="details.php?dId=<?php echo $post_id; ?>"><?php echo $title; ?></a></h2>
											<p><?php echo substr($post_desc, 0, 250) ?>[...]</p>
									
											<div class="post-meta">
												<span><i class="far fa-user"></i> By <a href="">
													<?php  
											      		$readUser_Sql = "SELECT * FROM users WHERE user_id='$author_id'";
											      		$readUser_Quary = mysqli_query($db, $readUser_Sql);

											      		while( $row = mysqli_fetch_assoc($readUser_Quary) ){
											      			$auth_id 	 = $row['user_id'];
											      			$auth_name = $row['fullname'];

											      			echo $auth_name;
											      		}

											      	?>
												</a> </span>

												<span><i class="far fa-folder"></i> <a href="">
													<?php  
											      		$readCat_Sql = "SELECT * FROM category WHERE cat_id='$category_id'";
											      		$readCat_Quary = mysqli_query($db, $readCat_Sql);

											      		while( $row = mysqli_fetch_assoc($readCat_Quary) ){
											      			$cc_id 	 = $row['cat_id'];
											      			$cc_name = $row['cat_name'];

											      			echo $cc_name;
											      		}

											      	?>
												</a> </span>

												<span><i class="far fa-comments"></i> <a href="#">0 Comments</a></span>
												<span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0"><a href="details.php?dId=<?php echo $post_id; ?>" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
											</div>
									
										</div>
									</article>

								<?php
								}
							}

							
						}

						else {

						}

						
					?>

					

					<!-- ########## START: PAGINATION ########## -->
					<!-- <ul class="pagination float-right">
						<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
					</ul> -->
					<!-- ########## END: PAGINATION ########## -->

				</div>
			</div>
		</div>

	</div>

			

<?php include "inc/footer.php"; ?>