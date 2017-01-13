<div id="wrapper">
	<header id="header">
		<!-- loads the avatar section -->
		<?php
			if($this->session->userdata('logged_in') == 1){
		?>
			<?php $this->load->view('template/avatar_v'); ?>
		<?php 
			}
		?>
		<!-- loads the avatar section -->
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
							<center><p id="personalDetailsFormAlert"></p></center>
							<div class="box row-fluid">	
								<br>
								<!-- Personal Details -->
								<div class="step">
									<h3>1. Personal Details</h3>
									<form id="personalDetailsForm">
										<div class="col-md-6">
											<div class="form-group">
												<label for="name" class="col-sm-2 control-label">First Name</label>
												<div class="col-sm-10">
													<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
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
												<label for="email" class="col-sm-2 control-label">Current Location</label>
												<div class="col-sm-10">
													<input type="text" name="currentLocation" id="currentLocation" class="form-control" id="email" placeholder="Address">
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
													<input type="text" name="pinNo" id="pinNo" class="form-control" placeholder="KRA PIN">
												</div>
											</div>			  
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="email" class="col-sm-2 control-label">National ID No.</label>
												<div class="col-sm-10">
													<input type="text" name="nationalIDNO" id="nationalIDNO" class="form-control" placeholder="National ID No.">
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
													<select class="form-control" name="maritalStatus" id="maritalStatus">
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
									</form>
								</div>
								<!-- Personal Details -->

								<!-- Qualifications -->
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
												<div class="col-md-2">
													<div class="form-group">
														<!-- <label for="school" class="col-sm-2 control-label">Certification</label> -->
														<p>Certification</p>
														<div class="col-sm-10">
															<select class="form-control" name="certification[]" id="certification">
																<option value="">Select</option>
							      								<option value="primary">Primary Education</option>
							      								<option value="Secondary">Secondary Education</option>
							      								<option value="cert">Certificate</option>
							      								<option value="dip">Diploma</option>
							      								<option value="degree">Degree</option>
							      								<option value="masters">Masters</option>
							      								<option value="PHD">PHD</option>
															</select>
														</div>
													</div>
												</div>			  
												<div class="col-md-5">
													<div class="form-group">
														<!-- <label for="school" class="col-sm-2 control-label">Description</label> -->
														<p>Description</p>
														<div class="col-sm-10">
															<input type="text" name="description" value="" class="form-control" id="description" placeholder="Description">
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<p>Years Completed</p>
														<div class="col-sm-10">
															<input type="number" name="years" min="1" value="" class="form-control" id="years" placeholder="Years"  style="width: 50%; display: inline-block;">
															<i class="fa fa-plus" aria-hidden="true" id="addQualifications" title="Add Qualification"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<!-- Qualifications -->

								<!-- Employment History -->
								<div class="step">
									<h3>Employment History</h3>	
									<form id="employmentForm">
										<div class="field_wrapper">
											<div>
												<div class="col-md-3">
													<div class="form-group">
														<p>Institution</p>
														<div class="col-sm-10">
															<input type="text" name="employmentInstitution[]" value="" class="form-control" id="employmentInstitution" placeholder="Institution">
														</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<p>Position</p>
														<div class="col-sm-10">
															<input type="text" name="employmentPosition[]" value="" class="form-control" id="employmentPosition" placeholder="Institution">
														</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<p>Responsibilities</p>
														<div class="col-sm-10">
															<input type="text" name="employmentResponsibilities[]" value="" class="form-control" id="employmentResponsibilities" placeholder="Institution">
														</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<p>Years</p>
														<div class="col-sm-10">
															<input type="number" min="1" name="employmentYears[]" value="" class="form-control" id="employmentYears" placeholder="Institution" style="width: 50%; display: inline-block;">
															<i class="fa fa-plus" aria-hidden="true" id="addEmploymentHistory" title="Add Employment History"></i>
														</div>
													</div>
												</div>
											</div>		  
										</div>
									</form>
								</div>
								<!-- Employment History -->

								<!-- Referees -->
								<div class="step">
									<h3>
										Referees &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<i class="fa fa-plus" aria-hidden="true" id="addReferee" title="Add Referee" style="cursor: pointer;"></i>
									</h3>	
									<form id="refereesForm">
										<div class="field_wrapper" >
											<div>
												<div class="col-md-3">
													<div class="form-group">
														<p>First Name</p>
															<input type="text" name="refereesFName" value="" class="form-control input-sm" id="refereesFName" placeholder="First Name">
														<p>Last Name</p>
															<input type="text" name="refereesLName" value="" class="form-control input-sm" id="refereesLName" placeholder="Last Name">
														<p>Referee Designation</p>
															<input type="text" name="refereesDesignation" value="" class="form-control input-sm" id="refereesDesignation" placeholder="Referee Designation">
														<p>Organization</p>
															<input type="text" name="refereesOrganization" value="" class="form-control input-sm" id="refereesOrganization" placeholder="Organization">
														<p>Phone</p>
															<input type="text" name="refereesPhone" value="" class="form-control input-sm" id="refereesPhone" placeholder="Phone">
														<p>Email</p>
															<input type="text" name="refereesEmail" value="" class="form-control input-sm" id="refereesEmail" placeholder="Email">
														<p>Website</p>
															<input type="text" name="refereesWebsite" value="" class="form-control input-sm" id="refereesWebsite" placeholder="Website">
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<!-- Referees -->

								<!-- Documents -->
								<div class="step">
									<h3>Documents</h3>	
									<form id="documentsForm">
										<div class="field_wrapper">
											<div>
												<div class="col-md-3">
													<div class="form-group">
														<p>Comprehensive Curriculum Vitae</p>
														<div class="col-sm-10">
															<input type="file" name="documentsCV" value="" class="form-control" id="documentsCV">
														</div>
													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group">
														<p>Application Letter</p>
														<div class="col-sm-10">
															<input type="file" name="documentsApplicationLetter" value="" class="form-control" id="documentsApplicationLetter">
														</div>
													</div>
												</div>
											</div>								
										</div>
									</form>
								</div>
								<!-- Documents -->

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
<script type="text/javascript" src="<?php echo base_url('assets/customScripts/personalDetails.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/customScripts/employmentHistory.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/customScripts/referee.js'); ?>"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$savePersonalDetailsURL = "<?php echo base_url('home/uploadResume/savePersonalDetails'); ?>";
		$saveQualificationDetailsURL = "<?php echo base_url('home/uploadResume/saveQualificationDetails'); ?>";
		$saveEmploymentHistoryDetailsURL = "<?php echo base_url('home/uploadResume/saveEmploymentHistoryDetails'); ?>";
		$saveRefereeDetailsURL = "<?php echo base_url('home/uploadResume/saveRefereeDetails'); ?>";
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
			$response = "";
			if(current < widget.length){
				// Check validation
				if(current == 1){
					//validate personal details
					// $response = validatePersonalDetails();
					// if($response == "Valid Form"){//the form is valid proceed and save information
					// 	//savePersonalDetails
					// 	savePersonalDetails(current);
					// }else{
					// 	$("#personalDetailsFormAlert").html($response);
					// }
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
					hideButtons(current);
				}else if(current == 2){
					//validate Qualifications
					// $response = validateQualifications(current);
					// console.log("Response from validate Qualifications "+$response );
					// if($response == "Valid Form"){
					// 	//proceed to save the details
					// 	saveQualificationDetails(current);
					// }else{
					// 	$("#personalDetailsFormAlert").html("Please fill in all the fields.");
					// }
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
					hideButtons(current);
				}else if(current ==3){
					//validate employment history
					// $response = validateEmploymentHistory();
					// if($response == "Valid Form"){
					// 	//proceed to save the details
					// 	saveEmploymentHistoryDetails(current);
					// }else{
					// 	$("#personalDetailsFormAlert").html("Please fill in all the fields.");
					// }
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
					hideButtons(current);
				}else if(current == 4){
					//validate Referees
					// $response = validateReferences();
					// if($response == "Valid Form"){
					// 	//proceed to save the details
					// 	saveRefereeDetails(current);
					// }else{
					// 	$("#personalDetailsFormAlert").html("Please fill in all the fields.");
					// }
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
					hideButtons(current);
				}else if(current == 5){
					//Documents
					$respose = validateDocuments();
				}

				
				
				
			}
			
		});


		window.validateQualifications = function(){
		    $('input', '#qualificationsForm').each(function(){
		    	if($(this).val() == ""){
		    		$response = "Please fill in all the fields";
		    	}else{
		    		$response = "Valid Form";
		    	}
			})
	        return $response;
		}

		
		window.saveQualificationDetails = function(current){
			$qualificationsFormValues = $('#qualificationsForm').serializeArray();
			$savePersonalDetailsResponse = '';
			$.post($saveQualificationDetailsURL,
				{
					'qualificationsFormValues':$qualificationsFormValues
				},function(data, status){
					if(data == "Inserted"){
						$("#personalDetailsFormAlert").html("Successfully saved your qualification details.");
						widget.show();
						widget.not(':eq('+(current++)+')').hide();
						setProgress(current);
						hideButtons(current);
					}else{
						$("#personalDetailsFormAlert").html("Error occurred while saving");
					}
				}
			);
		};

		window.validateDocuments = function(){

		}

		
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