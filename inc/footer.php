	<footer id="footer">
		<div class="container">
			<div class="footer-ribbon">
				<span>Get in Touch</span>
			</div>
			<div class="row py-5 my-4">
				<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
					<h5 class="text-3 mb-3">NEWSLETTER</h5>
					<p class="pr-1">Keep up on our always evolving product features and technology. Enter your e-mail address and subscribe to our newsletter.</p>
					<div class="alert alert-success d-none" id="newsletterSuccess">
						<strong>Success!</strong> You've been added to our email list.
					</div>
					<div class="alert alert-danger d-none" id="newsletterError"></div>
					<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST" class="mr-4 mb-3 mb-md-0">
						<div class="input-group input-group-rounded">
							<input class="form-control form-control-sm bg-light" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
							<span class="input-group-append">
								<button class="btn btn-light text-color-dark" type="submit"><strong>GO!</strong></button>
							</span>
						</div>
					</form>
				</div>
				<div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
					<h5 class="text-3 mb-3">LATEST TWEETS</h5>
					<div id="tweet" class="twitter" data-plugin-tweets data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
						<p>Please wait...</p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
					<div class="contact-details">
						<h5 class="text-3 mb-3">CONTACT US</h5>
						<ul class="list list-icons list-icons-lg">
							<li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i><p class="m-0">234 Street Name, City Name</p></li>
							<li class="mb-1"><i class="fab fa-whatsapp text-color-primary"></i><p class="m-0"><a href="tel:8001234567">(800) 123-4567</a></p></li>
							<li class="mb-1"><i class="far fa-envelope text-color-primary"></i><p class="m-0"><a href="mailto:mail@example.com">mail@example.com</a></p></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-2">
					<h5 class="text-3 mb-3">FOLLOW US</h5>
					<ul class="social-icons">
						<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
						<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
						<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container py-2">
				<div class="row py-4">
					<div class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
						<a href="index.html" class="logo pr-0 pr-lg-3">
							<img alt="Porto Website Template" src="assets/assets/img/logo-footer.png" class="opacity-5" height="33">
						</a>
					</div>
					<div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
						<p>© Copyright 2020. All Rights Reserved.</p>
					</div>
					<div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
						<nav id="sub-menu">
							<ul>
								<li><i class="fas fa-angle-right"></i><a href="page-faq.html" class="ml-1 text-decoration-none"> FAQ's</a></li>
								<li><i class="fas fa-angle-right"></i><a href="sitemap.html" class="ml-1 text-decoration-none"> Sitemap</a></li>
								<li><i class="fas fa-angle-right"></i><a href="contact-us.html" class="ml-1 text-decoration-none"> Contact Us</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.min.js"></script>
		<script src="assets/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="assets/vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="assets/vendor/popper/umd/popper.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/vendor/common/common.min.js"></script>
		<script src="assets/vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="assets/vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="assets/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="assets/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="assets/vendor/vide/jquery.vide.min.js"></script>
		<script src="assets/vendor/vivus/vivus.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/js/theme.js"></script>

		<!-- Theme Custom -->
		<script src="assets/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/js/theme.init.js"></script>

		<?php  
			ob_end_flush();
		?>
	</body>
</html>
