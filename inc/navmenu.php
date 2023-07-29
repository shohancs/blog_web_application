<div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
	<nav class="collapse header-mobile-border-top">
		<ul class="nav nav-pills" id="mainNav">

			<?php  
				$sql = "SELECT cat_id AS 'pCat', cat_name AS 'pCatName' FROM category WHERE is_parent=0 AND status=1 ORDER BY cat_name ASC";
				$readSql = mysqli_query($db, $sql);

				while ( $row = mysqli_fetch_assoc($readSql) ) {
					extract($row);

					$sql2 = "SELECT cat_id AS 'cCat', cat_name AS 'cCatName' FROM category WHERE is_parent='$pCat' AND status=1 ORDER BY cat_name ASC";
					$readCSql = mysqli_query($db, $sql2);
					$numOfChild = mysqli_num_rows($readCSql);
					echo $numOfChild;
					
				}
			?>

			<li class="dropdown">
				<a class="dropdown-item dropdown-toggle" href="index.php">
					Home
				</a>
			</li>
			<li class="dropdown">
				<a class="dropdown-item dropdown-toggle" href="#">
					Shop
				</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="shop-4-columns.html">4 Columns</a>
					</li>
					<li><a class="dropdown-item" href="shop-cart.html">Cart</a></li>
					<li><a class="dropdown-item" href="shop-login.html">Login</a></li>
					<li><a class="dropdown-item" href="shop-checkout.html">Checkout</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>