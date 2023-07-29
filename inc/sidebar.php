<aside class="sidebar">

	<form action="search_result.php" method="GET">
		<div class="input-group mb-3 pb-1">
			<input type="text" name="search" id="s" class="form-control text-1" placeholder="Search..." required>
			<span class="input-group-append">
				<button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
			</span>
		</div>
	</form>

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
						<li class="nav-item">
							<a class="nav-link active" href="category.php?id=<?php echo $pCat; ?>"><?php echo $pCatName; ?> (2)</a>
						</li>
					<?php }
					
					// dropdwn wala gula print hobe
					else{ ?>
						<li class="nav-item">
							<a class="nav-link active" href="category.php?id=<?php echo $pCat; ?>"><?php echo $pCatName; ?> (4)</a>

							<ul>
								<?php  
									while( $row = mysqli_fetch_assoc($readCSql) ){
										extract($row);
										?>
										
										<li class="nav-item"><a class="nav-link" href="category.php?id=<?php echo $cCat; ?>"><?php echo $cCatName; ?></a></li>

										<?php
									}
								?>								
							</ul>
						</li>
						
					<?php }
					
				}
			?>
		
		
	</ul>

	<div class="tabs tabs-dark mb-4 pb-2">
		<ul class="nav nav-tabs">
			<li class="nav-item active"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-toggle="tab">Popular</a></li>
			<li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recent</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="popularPosts">
				<ul class="simple-post-list">
					<li>
						<div class="post-image">
							<div class="img-thumbnail img-thumbnail-no-borders d-block">
								<a href="blog-post.html">
									<img src="assets/img/blog/square/blog-11.jpg" width="50" height="50" alt="">
								</a>
							</div>
						</div>
						<div class="post-info">
							<a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
							<div class="post-meta">
								 Nov 10, 2020
							</div>
						</div>
					</li>
					<li>
						<div class="post-image">
							<div class="img-thumbnail img-thumbnail-no-borders d-block">
								<a href="blog-post.html">
									<img src="assets/img/blog/square/blog-24.jpg" width="50" height="50" alt="">
								</a>
							</div>
						</div>
						<div class="post-info">
							<a href="blog-post.html">Vitae Nibh Un Odiosters</a>
							<div class="post-meta">
								 Nov 10, 2020
							</div>
						</div>
					</li>
					<li>
						<div class="post-image">
							<div class="img-thumbnail img-thumbnail-no-borders d-block">
								<a href="blog-post.html">
									<img src="assets/img/blog/square/blog-42.jpg" width="50" height="50" alt="">
								</a>
							</div>
						</div>
						<div class="post-info">
							<a href="blog-post.html">Odiosters Nullam Vitae</a>
							<div class="post-meta">
								 Nov 10, 2020
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="tab-pane" id="recentPosts">
				<ul class="simple-post-list">
					<li>
						<div class="post-image">
							<div class="img-thumbnail img-thumbnail-no-borders d-block">
								<a href="blog-post.html">
									<img src="assets/img/blog/square/blog-24.jpg" width="50" height="50" alt="">
								</a>
							</div>
						</div>
						<div class="post-info">
							<a href="blog-post.html">Vitae Nibh Un Odiosters</a>
							<div class="post-meta">
								 Nov 10, 2020
							</div>
						</div>
					</li>
					<li>
						<div class="post-image">
							<div class="img-thumbnail img-thumbnail-no-borders d-block">
								<a href="blog-post.html">
									<img src="assets/img/blog/square/blog-42.jpg" width="50" height="50" alt="">
								</a>
							</div>
						</div>
						<div class="post-info">
							<a href="blog-post.html">Odiosters Nullam Vitae</a>
							<div class="post-meta">
								 Nov 10, 2020
							</div>
						</div>
					</li>
					<li>
						<div class="post-image">
							<div class="img-thumbnail img-thumbnail-no-borders d-block">
								<a href="blog-post.html">
									<img src="assets/img/blog/square/blog-11.jpg" width="50" height="50" alt="">
								</a>
							</div>
						</div>
						<div class="post-info">
							<a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
							<div class="post-meta">
								 Nov 10, 2020
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<h5 class="font-weight-bold pt-4">About Us</h5>
	<p>Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Nulla nunc dui, tristique in semper vel. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. </p>
</aside>