<aside class="sidebar">

	<form action="search_result.php" method="GET">
		<div class="input-group mb-3 pb-1">
			<input type="text" name="search" id="s" class="form-control text-1" placeholder="Search..." required>
			<span class="input-group-append">
				<button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
			</span>
		</div>
	</form>

	<!-- ########## START: RIGHT SIDE BAR ########## -->
	<h5 class="font-weight-bold pt-4">Categories</h5>
	<ul class="nav nav-list flex-column mb-5">
		<?php  

				// Parent Cat
				$sql = "SELECT cat_id AS 'pCat', cat_name AS 'pCatName' FROM category WHERE is_parent=0 AND status=1 ORDER BY cat_name ASC";
				$readSql = mysqli_query($db, $sql);

				while ( $row = mysqli_fetch_assoc($readSql) ) {
					extract($row);

					// Child Cat
					$sql2 = "SELECT cat_id AS 'cCat', cat_name AS 'cCatName' FROM category WHERE is_parent='$pCat' AND status=1 ORDER BY cat_name ASC";
					$readCSql = mysqli_query($db, $sql2);
					$numOfChild = mysqli_num_rows($readCSql);

					// ekhon drop down er bepar separ niye kaj korbo

					// if ta dropdown chara gula print korebe
					if ($numOfChild == 0) { ?>

						<?php  
							// Sub Category te koida post acea
							$findParCat_Sql = "SELECT * FROM post WHERE category_id='$pCat' ";
							$findParCat_Query = mysqli_query($db, $findParCat_Sql);
							$countParCat = mysqli_num_rows($findParCat_Query);
							?>
							<li class="nav-item">
								<a class="nav-link active" href="category.php?id=<?php echo $pCat; ?>"><?php echo $pCatName; ?> (<?php echo $countParCat; ?>)</a>
							</li>
						<?php ?>
						
					<?php }
					
					// dropdwn wala gula print hobe
					else{ ?>

						<?php  
							// Sub Category te koida post acea
							$findParCat_Sql = "SELECT * FROM post WHERE category_id='$pCat' ";
							$findParCat_Query = mysqli_query($db, $findParCat_Sql);
							$countParCat = mysqli_num_rows($findParCat_Query);
							?>
							<li class="nav-item">
							<a class="nav-link active" href="category.php?id=<?php echo $pCat; ?>"><?php echo $pCatName; ?> (<?php echo $countParCat; ?>)</a>
						<?php ?>						

							<ul>
								<?php  
									while( $row = mysqli_fetch_assoc($readCSql) ){
										extract($row);

										// Sub Category te koida post acea
										$findSubCat_Sql = "SELECT * FROM post WHERE category_id='$cCat' ";
										$findSubCat_Query = mysqli_query($db, $findSubCat_Sql);
										$countSubCat = mysqli_num_rows($findSubCat_Query);
										?>
										
										<li class="nav-item"><a class="nav-link" href="category.php?id=<?php echo $cCat; ?>"><?php echo $cCatName; ?> (<?php echo $countSubCat;  ?>)</a></li>

										<?php
									}
								?>								
							</ul>
						</li>
						
					<?php }
					
				}
			?>
	</ul>
	<!-- ########## END: RIGHT SIDE BAR ########## -->

	<div class="tabs tabs-dark mb-4 pb-2">
		<ul class="nav nav-tabs">
			<li class="nav-item active">
				<a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recent</a>
			</li>
		</ul>
		<div class="tab-content">
			<!-- Recent Post -->
			<div class="tab-pane active" id="recentPosts">
				<ul class="simple-post-list">
					<?php  
						$recentSql = "SELECT * FROM post WHERE status=1 ORDER BY post_id DESC LIMIT 3";
						$recentQuery = mysqli_query($db, $recentSql);

						while ( $row = mysqli_fetch_assoc($recentQuery) ) {
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
								<li>
									<div class="post-image">
										<div class="img-thumbnail img-thumbnail-no-borders d-block">
											<a href="details.php?dId=<?php echo $post_id; ?>">
											<?php 
												if (!empty($image)) {
													echo '<img src="admin/assets/images/posts/' . $image . '" alt="'. $title .'"  width="50" height="50">';
												}
												else {
													echo '<img src="img/blog/wide/blog-11.jpg" alt="" width="50" height="50">';
												}
											?>
											
										</a>
										</div>
									</div>
									<div class="post-info">
										<a href="details.php?dId=<?php echo $post_id; ?>"><?php echo $title; ?></a>
										<div class="post-meta">
											 <?php echo $post_date; ?>
										</div>
									</div>
								</li>
							<?php
						}
					?>
					
				</ul>
			</div>
		</div>
	</div>
	<h5 class="font-weight-bold pt-4">About Us</h5>
	<p>Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Nulla nunc dui, tristique in semper vel. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. </p>
</aside>