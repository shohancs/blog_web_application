<div class="header-column">
	<div class="header-row">
		<div class="header-nav header-nav-links justify-content-center">
			<div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
				<nav class="collapse header-mobile-border-top">
					<ul class="nav nav-pills" id="mainNav">

						<li class="dropdown">
							<a class="dropdown-item dropdown-toggle" href="index.php">
								All News
							</a>
						</li>

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
									<li class="dropdown">
										<a class="dropdown-item dropdown-toggle" href="category.php?id=<?php echo $pCat; ?>">
											<?php echo $pCatName; ?>
										</a>
									</li>
								<?php }
								
								// dropdwn wala gula print hobe
								else{ ?>
									<li class="dropdown">
										<a class="dropdown-item dropdown-toggle" href="category.php?id=<?php echo $pCat; ?>">
											<?php echo $pCatName; ?>
										</a>
										<ul class="dropdown-menu">
											<?php  
												while( $row = mysqli_fetch_assoc($readCSql) ){
													extract($row);
													?>
														<li><a class="dropdown-item" href="category.php?id=<?php echo $cCat; ?>"><?php echo $cCatName; ?></a></li>
													<?php
												}
											?>
											
											
										</ul>
									</li>
									
								<?php }
								
							}
						?>

						<!-- For users login or nor -->
						<?php  
							if (!empty($_SESSION['user_id'])) { 

								$user_id = $_SESSION['user_id'];
								$readUId_Sql = "SELECT * FROM users WHERE status=1 AND user_id='$user_id'";
								$readUId_Query = mysqli_query($db, $readUId_Sql);

								while( $row = mysqli_fetch_assoc($readUId_Query) ) {
									$user_id 				= $row['user_id'];
									$fullname 				= $row['fullname'];
									$_SESSION['email'] 		= $row['email'];
									$password 				= $row['password'];
									$role 					= $row['role'];
									$status 				= $row['status'];
									?>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle" href="">
												<?php echo $fullname; ?>
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="user_manage.php?uid=<?php echo $_SESSION['user_id']; ?>">Profile Update</a></li>
												<li><a class="dropdown-item" href="">Blog Post</a></li>
												<li><a class="dropdown-item" href="logout.php">Log Out</a></li>
											</ul>
										</li>
									<?php
								}

								?>
								
							<?php }

							else { ?>
								<li class="dropdown">
									<a class="dropdown-item dropdown-toggle" href="login.php">
										<i class="fa-solid fa-arrow-right-to-bracket px-1"></i> Login
									</a>
								</li>

								<li class="dropdown">
									<a class="dropdown-item dropdown-toggle" href="register.php">
										<i class="fa-regular fa-address-card px-1"></i> Regsiter
									</a>
								</li>

							<?php }
						?>
						<!-- For users login or nor -->

						
						
					</ul>
				</nav>
			</div>

		</div>
	</div>
</div>


<!-- HEADER NAVIGATION ICON -->
<div class="header-column header-column-border-left flex-grow-0 justify-content-center">
	<div class="header-row pl-4 justify-content-end">
		<ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean m-0">
			<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
			<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
			<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
		</ul>
		<button class="btn header-btn-collapse-nav ml-0 ml-sm-3" data-toggle="collapse" data-target=".header-nav-main nav">
			<i class="fas fa-bars"></i>
		</button>
	</div>
</div>
<!-- HEADER NAVIGATION ICON -->