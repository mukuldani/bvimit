<!--Connection to Database-->
<?php require_once('includes/connection.php'); ?>
<!--Header-->
<?php include('includes/header.php'); ?>

	<!--Cover Image Section:start-->
	<section id="cover-admission">
		<div class="container-fluid" style="padding-top:169px;">
			<div class="row general-bg cover-contactus">
				<a href="#contactus" class="bottom-25 arrow-down"></a>
			</div>
		</div>
	</section>
	<!--Cover Image Section:end-->
	<!--Map:start-->
	<a id="contactus" style="position:relative;top:-150px;display:block;visibility:hidden;"></a>
	<section>
		<div class="container-fluid">
			<div class="row padding-bottom-10">
				<div class="col-md-10 col-md-offset-1 padding-left-0">
					<h1 class="text-center"> Contact Us </h1>
					<hr class="small">
					<div class="row">
						<!--Map-->
						<div class="col-md-6 padding-left-0">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.7879327177307!2d73.04228834999996!3d19.029064199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c24ae7f38c4d%3A0x6c245daebfcc7c33!2sBharati+Vidyapeeth%E2%80%99s+Institute+of+Management+Studies+%26+Research!5e0!3m2!1sen!2sin!4v1441539154286" allowfullscreen width="100%" height="450" style="border:0"></iframe>
						</div>
						<!--Conatct-us form-->
						<div class="col-md-6 col-center-contactus">
							<form class="contactus-text col-width-form" id="" method="post" autocomplete="off">
								<div class="group">
									<input type="text" required id="name" name="name" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>NAME</label>
								</div>

								<div class="group">
									<input type="text" required id="email" name="email" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>EMAIL ID</label>
								</div>

								<div class="group">
									<input type="text" required id="phoneNo" name="phone" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>PHONE NUMBER</label>
								</div>

								<div class="group">
									<input type="text" required id="message" name="message" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>MESSAGE</label>
								</div>

								<div class="form-group" style="display:flex;justify-content:center;">
									<button type="submit" class="btn btn-color" style="text-align:center" id="submit" onclick="return false;">SUBMIT</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Map:end-->

<!--Footer-->
<?php require('includes/footer.php'); ?>
