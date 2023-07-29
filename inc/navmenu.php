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

			
			
		</ul>
	</nav>
</div>