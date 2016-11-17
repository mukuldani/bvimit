	<!--Footer-->
	<footer id="footer">
		<div class="wrapper">
			<div class="conatiner-fluid">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="row">
							<div class="col-md-4">
								<span class="footer-heading"> Popular Links </span>
								<ul class="list-unstyled footer-list">
									<li> <a href="adimissions.php"> Admissions </a></li>
									<li> <a href="academics.php"> Academics </a></li>
									<li> <a href="placements.php"> Placements </a></li>
									<li> <a href="#"> Alumni </a></li>
									<li> <a href="#"> Campus </a></li>
									<li> <a href="#"> Events </a></li>
								</ul>
							</div>

							<div class="col-md-4">
								<span class="footer-heading"> Useful Links </span>
								<ul class="list-unstyled footer-list">
									<li> <a href="aboutus.php"> About Us </a></li>
									<li> <a href="aboutus.php#founder-message"> Founder's Message </a></li>
									<li> <a href="aboutus.php#director-message"> Director's Message </a></li>
									<li> <a href="aboutus.php#vision-mission"> Vision &amp; Mission</a></li>
									<li> <a href="faculty.php"> Faculty </a></li>
									<li> <a href="#"> Students Corner </a></li>
									<li> <a href="#"> Library </a></li>
									<li> <a href="#"> Computer Lab </a></li>
									<li> <a href="#"> Anti Ragging </a></li>
									<li> <a href="#"> Women Harasment Cell </a></li>
									<li> <a href="conatctus.php"> Contact Us </a></li>
								</ul>
							</div>

							<div class="col-md-4">
								<span class="footer-heading"> Contact Us </span>
								<div class="row line-height-2">
									<div class="col-md-2 pull-left">
										<i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
									</div>
									<div class="col-md-10 pull-right padding-left-0">
										<div>Bharati Vidyapeeth's Institute of Management &amp; Information Technology.</div>
										<div>Sector-8, C.B.D.Belapur, Navi Mumbai - 400614</div>
									</div>
								</div>
								<div class="row line-height-2">
									<div class="col-md-2 pull-left">
										<i class="fa fa-phone fa-lg" aria-hidden="true"></i>
									</div>
									<div class="col-md-10 pull-right padding-left-0">
										<div> 022-27869202 </div>
									</div>
								</div>
								<div class="row line-height-2">
									<div class="col-md-2 pull-left">
										<i class="fa fa-fax fa-lg" aria-hidden="true"></i>
									</div>
									<div class="col-md-10 pull-right padding-left-0">
										<div> 022-27571182 </div>
									</div>
								</div>
								<div class="row line-height-2">
									<div class="col-md-2 pull-left">
										<i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
									</div>
									<div class="col-md-10 pull-right padding-left-0">
										<div> <a href="mailto:imitmumbai@bharatividyapeeth.edu" class="mailto"> imitmumbai@bharatividyapeeth.edu </a></div>
									</div>
								</div>

								<div class="row line-height-5">
									<div class="col-md-12">
										<ul class="list-unstyled social-icons">
											<a href="#">
												<i class="fa fa-facebook fa-2x"></i>
											</a>
											<a href="#">
												<i class="fa fa-twitter fa-2x"></i>
											</a>
											<a href="#">
												<i class="fa fa-rss fa-2x"></i>
											</a>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<span class="footer-logo"></span>
					<img src="assets/images/bvimit_small_logo.png" class="img-responsive">
					<hr class="small">
				</div>
			</div>
		</div>
-->

		<div class="sub-footer">
			© 2016 All Rights Reseverd Bharati Vidyapeeth
		</div>
	</footer>
</body>

</html>

<<?php
	if(isset($connection)){
		mysqli_close($connection);
	}
?>
