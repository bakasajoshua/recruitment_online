<script src="<?php echo base_url('assets/multistepForm/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/multistepForm/validate.js'); ?>"></script>
<script src="<?php echo base_url('assets/multistepForm/bootstrap.min.js'); ?>"></script>

<div id="wrapper">
	<header id="header">
		<div id="header-bar">
			<div class="container">
				<ul class="jobboard-social-media"></ul><!-- /.social-media -->
				<div class="jobboard-login-register clearfix">
					<div class="user_menu dropdown">
						<a data-toggle="dropdown" href="#">
							<img alt='' src='http://2.gravatar.com/avatar/5c31bff251f7ae657d32f986bd65d240?s=35&#038;d=mm&#038;r=g' srcset='http://2.gravatar.com/avatar/5c31bff251f7ae657d32f986bd65d240?s=70&amp;d=mm&amp;r=g 2x' class='avatar avatar-35 photo' height='35' width='35' />
							<span>hi, demo1</span>
							<i class="fa fa-caret-down"></i>
						</a>				
						<div class="dropdown-menu clearfix" role="menu">
							<ul>
								<li>
									<a href="<?php echo base_url('home/myAccount'); ?>">Dashboard</a>
								</li>
								<li>
									<a href="<?php echo base_url('home/accountsettings'); ?>">Profile</a>
								</li>
								<li>
									<a href="http://zury.co.ke/kippra/?action=logout">Log Out</a>									
								</li>
							</ul>
							<img alt='' src='http://2.gravatar.com/avatar/5c31bff251f7ae657d32f986bd65d240?s=70&#038;d=mm&#038;r=g' srcset='http://2.gravatar.com/avatar/5c31bff251f7ae657d32f986bd65d240?s=140&amp;d=mm&amp;r=g 2x' class='avatar avatar-70 photo' height='70' width='70' />				
						</div>
					</div><!-- /.user_menu -->
				</div>
			</div><!-- /.container -->
		</div><!-- /#header-bar -->			
		<?php echo $this->load->view('template/menu_v'); ?>
		</header><!-- /#header -->
		<div id="content">
			<div class="container">
				<div class="row">
					<br><br>
					<form class="form-horizontal form">
						<div class="col-md-12">   	

							<div class="progress">
								<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
							</div>

							<div class="box row-fluid">	
								<br>
								<div class="step">
									<h3>1. Personal Details</h3>
									<div class="col-md-6">
										<div class="form-group">
											<label for="name" class="col-sm-2 control-label">First Name</label>
											<div class="col-sm-10">
												<input type="text" name="fname" id="fname" class="form-control" id="name" placeholder="First Name">
											</div>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">Middle Name</label>
											<div class="col-sm-10">
												<input type="text" name="mname" id="mname" class="form-control" id="email" placeholder="Middle Name">
											</div>
										</div>			  
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">Last Name</label>
											<div class="col-sm-10">
												<input type="text" name="lname" id="lname" class="form-control" id="email" placeholder="Last Name">
											</div>
										</div>			  
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">Mobile No.</label>
											<div class="col-sm-10">
												<input type="text" name="mobileNo" id="mobileNo" class="form-control" id="email" placeholder="Mobile No.">
											</div>
										</div>			  
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">Address</label>
											<div class="col-sm-10">
												<input type="text" name="address" id="address" class="form-control" id="email" placeholder="Address">
											</div>
										</div>			  
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="country" class="col-sm-2 control-label">Country</label>
											<div class="col-sm-10">
												<select class="form-control" name="country" id="country">
													<?php $this->load->view('home/listOfCountries'); ?>
												</select>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">PIN No.</label>
											<div class="col-sm-10">
												<input type="text" name="pinNo" id="pinNo" class="form-control" id="email" placeholder="KRA PIN">
											</div>
										</div>			  
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">Passport No.</label>
											<div class="col-sm-10">
												<input type="text" name="passportNo" id="passportNo" class="form-control" id="passportNo" placeholder="(Optional)">
											</div>
										</div>			  
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="country" class="col-sm-2 control-label">Disabled?</label>
											<div class="col-sm-10">
												<select class="form-control" name="disabledStatus" id="disabledStatus">
													<option value="">Select</option>
				      								<option value="Yes">Yes</option>
				      								<option value="No">No</option>
												</select>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="country" class="col-sm-2 control-label">Marital Status?</label>
											<div class="col-sm-10">
												<select class="form-control" name="disabledStatus" id="disabledStatus">
													<option value="">Select</option>
				      								<option value="single">Single</option>
				      								<option value="married">Married</option>
				      								<option value="divorced">Divorced</option>
				      								<option value="separated">Separated</option>
				      								<option value="widow">Widow(er)</option>
				      								<option value="otjer">Other</option>
												</select>
											</div>
										</div>
									</div>
								</div>

								<div class="step">
									<h3>2. Qualifications</h3>
									<form id="qualificationsForm">
										<div class="field_wrapper">
											<div>
												<div class="col-md-3">
													<div class="form-group">
														<p>Institution</p>
														<div class="col-sm-10">
															<input type="text" name="school" value="" class="form-control" id="school" placeholder="Institution">
														</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<!-- <label for="school" class="col-sm-2 control-label">Certification</label> -->
														<p>Certification</p>
														<div class="col-sm-10">
															<input type="text" name="certification" value="" class="form-control" id="certification" placeholder="Certification">
														</div>
													</div>
												</div>			  
												<div class="col-md-3">
													<div class="form-group">
														<!-- <label for="school" class="col-sm-2 control-label">Description</label> -->
														<p>Description</p>
														<div class="col-sm-10">
															<input type="text" name="description" value="" class="form-control" id="description" placeholder="Description">
														</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<p>Years Completed</p>
														<div class="col-sm-10">
															<input type="text" name="years" value="" class="form-control" id="years" placeholder="Years">
														</div>
													</div>
													<p id="addQualifications">Add Fields</p>
												</div>
											</div>
										</div>
									</form>
								</div>

								<div class="step display">
									<h4>Confirm Details</h4>
									<div class="form-group">
										<label class="col-sm-2 control-label">Name :</label>
										<label class="col-md-10 control-label lbl" data-id="name"></label>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Email :</label>
										<label class="col-md-10 control-label lbl" data-id="email"></label>
									</div>			  
									<div class="form-group">
										<label class="col-sm-2 control-label">Country :</label>
										<label class="col-md-10 control-label lbl" data-id="country"></label>
									</div>			  
									<div class="form-group">
										<label class="col-sm-2 control-label">Username :</label>
										<label class="col-md-10 control-label lbl" data-id="username"></label>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Password :</label>
										<label class="col-md-10 control-label lbl" data-id="password"></label>
									</div>			  
								</div>

								<div class="row">
									<div class="col-sm-12">
										<div class="pull-right">
											<button type="button" class="action btn-sky text-capitalize back btn">Back</button>
											<button type="button" class="action btn-sky text-capitalize next btn">Next</button>
											<button type="button" class="action btn-hot text-capitalize submit btn" id="submitCV">Submit</button>
										</div>
									</div>
								</div>			

							</div>
						</div> 
					</form> 
				</div>
			</div>
		</div>

	<footer id="footer">
		<div id="footer-text" class="container">
			Developed By Sepia			
		</div><!-- /#footer-text -->
	</footer><!-- /#footer -->
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var current = 1;
		
		widget      = $(".step");
		btnnext     = $(".next");
		btnback     = $(".back"); 
		btnsubmit   = $(".submit");

		// Init buttons and UI
		widget.not(':eq(0)').hide();
		hideButtons(current);
		setProgress(current);

		// Next button click action
		btnnext.click(function(){
			if(current < widget.length){
				// Check validation
				if($(".form").valid()){
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
				}
			}
			hideButtons(current);
		})

		// Submit button click
		btnsubmit.click(function(){
			alert("Submit button clicked");
		});


		// Back button click action
		btnback.click(function(){
			if(current > 1){
				current = current - 2;
				if(current < widget.length){
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
				}
			}
			hideButtons(current);
		})

	    $('.form').validate({ // initialize plugin
	    	ignore:":not(:visible)",			
	    	rules: {
	    		name     : "required",
	    		email    : {required : true, email:true},
	    		country  : "required",
	    		username : "required",
	    		password : "required",
	    		rpassword: { required : true, equalTo: "#password"},
	    	},
	    });

	});

	// Change progress bar action
	setProgress = function(currstep){
		var percent = parseFloat(100 / widget.length) * currstep;
		percent = percent.toFixed();
		$(".progress-bar").css("width",percent+"%").html(percent+"%");		
	}

	// Hide buttons according to the current step
	hideButtons = function(current){
		var limit = parseInt(widget.length); 

		$(".action").hide();

		if(current < limit) btnnext.show();
		if(current > 1) btnback.show();
		if (current == limit) { 
			// Show entered values
			$(".display label.lbl").each(function(){
				$(this).html($("#"+$(this).data("id")).val());	
			});
			btnnext.hide(); 
			btnsubmit.show();
		}
	}
</script>
<script type="text/javascript">
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-19096935-1', 'auto'); ga('send', 'pageview');
</script>