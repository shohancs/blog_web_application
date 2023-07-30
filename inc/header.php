<?php  
	ob_start();
	session_start();
	include "admin/inc/db.php";
?>

<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Blog | Home</title>	

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="assets/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="assets/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/css/theme.css">
		<link rel="stylesheet" href="assets/css/theme-elements.css">
		<link rel="stylesheet" href="assets/css/theme-blog.css">
		<link rel="stylesheet" href="assets/css/theme-shop.css">

		<!-- FONT AWESOME CDN LINK -->
		<script src="https://kit.fontawesome.com/0c66e46c25.js" crossorigin="anonymous"></script>
		
		<!-- Demo CSS -->

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/css/skins/default.css"> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/css/custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.min.js"></script>

	</head>
	<body>

		<div class="body">
			<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
				<div class="header-body border-top-0">
					<div class="header-container container-fluid px-lg-4">
						<div class="header-row">

							<!-- ########## START: HEADER NAVIGATION ########## -->

							<!-- HEADER NAVIGATION lOGO -->
							<div class="header-column header-column-border-right flex-grow-0">
								<div class="header-row pr-4">
									<div class="header-logo">
										<a href="index.php">
											<img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" src="assets/img/logo.png">
										</a>
									</div>
								</div>
							</div>
							<!-- HEADER NAVIGATION lOGO -->
							
							<!-- HEADER NAVIGATION lIST ITEM -->
							<?php include"inc/navmenu.php"; ?>

							<!-- ########## END: HEADER NAVIGATION ########## -->

						</div>
					</div>
				</div>
			</header>

			