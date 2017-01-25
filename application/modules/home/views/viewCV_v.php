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

		<!-- Modal Contact Resume -->
		<div class="modal fade" id="contact-resume-modal" tabindex="-1" role="dialog" aria-labelledby="jobboard-modal-label" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="contact-job-seeker" method="post" action="http://zury.co.ke/kippra/wp-admin/admin-ajax.php">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="jobboard_apply_job">Contact Job Seeker</h4>
						</div><!-- /.modal-header -->
					
						<div class="modal-body">
							<div class="form-group">
								<label for="contact_name">Your Name*</label>
								<input class="form-control" type="text" name="contact_name" id="contact_name" required="required" />
							</div><!-- /.form-group -->
						
							<div class="form-group">
								<label for="contact_email">Your Email*</label>
								<input class="form-control" type="email" name="contact_email" id="contact_email" required="required" />
							</div><!-- /.form-group -->
						
							<div class="form-group">
								<label for=contact_message">Your Message*</label>
								<textarea name="contact_message" id="contact_message" class="form-control" required="required" rows="8"></textarea>
							</div><!-- /.form-group -->
							
							<div class="contact-form-status alert alert-success alert-dismissable" role="alert">
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times"></i></span><span class="sr-only">Close</span></button>
								<strong>Thank you!</strong> Your message was sent successfully					</div>
						</div><!-- /.modal-body -->
					
						<div class="modal-footer">
							<button class="btn btn-send-contact-form" type="submit" name="submit" id="submit" value="1" data-loading-text="Sending...">Send</button>
							<input type="hidden" name="job_seeker_id" value="1 " />
							<input type="hidden" name="action" value="jobboard_send_contact_job_seeker" />
						</div><!-- /.modal-footer -->
					</form>
				</div><!-- ./modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal fade -->
		<!-- /.Modal Contact Resume -->

		<div id="page-title-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<h1 class="frontend-title">Curriculum Vitae</h1>
					</div><!-- /.col-md-6 -->
				</div>
			</div>
		</div><!-- /.row -->

	</div><!-- /.container -->
</div><!-- /#page-title -->
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="skills-container">
					<h3 class="skills-title">
						Personal Details
					</h3>	
					<?php 
						$myCVPersonalDetails = json_decode($myCVPersonalDetails);
						if(sizeof($myCVPersonalDetails) == 0){//the user has not provided any personal details
					?>
						<div class="alert alert-warning">
							<p>Complete your CV to view your personal details here.</p>
						</div>						
					<?php
						}else{//display the personal info
					?>
						<h3 class="skills-title">
							<?php echo $myCVPersonalDetails[0]->fname." ".$myCVPersonalDetails[0]->mname." ".$myCVPersonalDetails[0]->lname  ?> 
						</h3>
						<div class="the-skills">
							<span class="skill-item">Email: <?php echo $myCVPersonalDetails[0]->email; ?></span>
							<span class="skill-item">Mobile: <?php echo $myCVPersonalDetails[0]->mobileNo ?></span>
							<span class="skill-item">Address: <?php echo $myCVPersonalDetails[0]->address ?></span>
							<span class="skill-item">Current Location: <?php echo $myCVPersonalDetails[0]->currentLocation ?></span>
							<span class="skill-item">Country: <?php echo $myCVPersonalDetails[0]->country ?></span>
							<span class="skill-item">ID: <?php echo $myCVPersonalDetails[0]->nationalID ?></span>
							<span class="skill-item">PIN(KRA): <?php echo $myCVPersonalDetails[0]->PIN ?></span>
							<span class="skill-item">Marital Status: <?php echo $myCVPersonalDetails[0]->maritalStatus ?> </span>
						</div><!-- /.the-skills -->
						<a href="#" class="btn btn-contact" data-toggle="modal" data-target="#contact-resume-modal" style="color:#ffffff;">Edit</a>
					<?php
						}
					?>
				</div><!-- /.skills-container -->
				<hr/>
				<div class="education-container">
					<h3 class="educations-title">Education</h3>
					<?php 
						$getQualificationDetails = json_decode($getQualificationDetails);
						$sizeOfObject = sizeof($getQualificationDetails);
						$educationList = "";
						if($sizeOfObject == 0){
							$educationList = '<div class="alert alert-warning">
												<p>Complete your CV to view your education history here.</p>
											</div>	';
							echo $educationList;
						}

						for($i = 0; $i<$sizeOfObject; $i++) {
							$email = $getQualificationDetails[$i]->email;
							$institution = $getQualificationDetails[$i]->institution;
							$certificationType = $getQualificationDetails[$i]->certificationType;
							$description = $getQualificationDetails[$i]->description;
							$yearsCompleted = $getQualificationDetails[$i]->yearsCompleted;
							
							$educationList = '<ul class="resume-lists">';
								$educationList .= '<li>';
									$educationList .= '<div class="education-name"><strong>'.$institution.'</strong></div>';
									$educationList .= '<span class="education-period"><i class="fa fa-fw fa-calendar"></i>&nbsp;'.$yearsCompleted.'&nbsp;years :&nbsp;</span>';
									$educationList .= '<span class="education-study-field"></span><br />';
									$educationList .= '<span class="education-grade"><i class="fa fa-fw fa-star"></i>&nbsp;'.$description.'&nbsp;:&nbsp;</span><br />';
									$educationList .= '<span class="education-qualification"><i class="fa fa-fw fa-check"></i>&nbsp;Qualification&nbsp;:&nbsp;'.$certificationType.'</span>';
								$educationList .= '</li>';
							$educationList .= '</ul>';

							echo $educationList;
						}
					?>
					<a href="#" class="btn btn-contact" data-toggle="modal" data-target="#contact-resume-modal" style="color:#ffffff;">Edit</a>
					<hr/>
					<div class="experience-container">
						<h3 class="educations-title">Documents</h3>
						<?php 
							$getUserDocDetails = json_decode($getUserDocDetails);
							$sizeOfObject = sizeof($getUserDocDetails);
							if($sizeOfObject == 0){
								$educationList = '<div class="alert alert-warning">
												<p>Complete your CV to view your education history here.</p>
											</div>	';
								echo $educationList;
							}

							for($i = 0; $i<$sizeOfObject; $i++) {
								$linkToCv = json_decode($getUserDocDetails[$i]->linkToCV);
								$linkToApplicationLetter = json_decode($getUserDocDetails[$i]->linkToApplicationLetter);

								$documentList = '<ul class="resume-lists">';
									$documentList .= '<li>';
										$documentList .= '<div class="education-name"><strong></strong></div>';
										$documentList .= '<span class="education-period">';
											$documentList .= '<i class="fa fa-fw fa-link"></i>&nbsp;<a href="'.$linkToCv.'" target="_blank">CV</a>';
										$documentList .= '</span>';
										$documentList .= '<br/>';
										$documentList .= '<span class="education-period">';
											$documentList .= '<i class="fa fa-fw fa-link"></i>&nbsp;<a href="'.$linkToApplicationLetter.'" target="_blank">Application Letter</a>';
										$documentList .= '</span>';
									$documentList .= '</li>';
								$documentList .=  '</ul>';

								echo $documentList;
							}
						?>
						<!-- <ul class="resume-lists">
							<li>							
								<div class="education-name"><strong></strong></div>
								<span class="education-period">
									<i class="fa fa-fw fa-link"></i>&nbsp;<a href="" target="_blank">CV</a>
								</span>
								<br/>
								<span class="education-period">
									<i class="fa fa-fw fa-link"></i>&nbsp;<a href="" target="_blank">Application Letter</a>
								</span>
								<br/>
								<span class="education-period">
									<i class="fa fa-fw fa-link"></i>&nbsp;<a href="" target="_blank">Certificate 1</a>
								</span>
								<br/>
								<span class="education-period">
									<i class="fa fa-fw fa-link"></i>&nbsp;<a href="" target="_blank">Certificate 2</a>
								</span>
							</li>					
						</ul> -->
					</div>
					<a href="#" class="btn btn-contact" data-toggle="modal" data-target="#contact-resume-modal" style="color:#ffffff;">Edit</a>

				</div><!-- /.education-container -->
			</div><!-- /.col-md-6 -->

			<div class="col-md-6">
				<div class="education-container">
					<h3 class="educations-title">References</h3>
						<?php 
							$getRefereeDetails = json_decode($getRefereeDetails);
							$sizeOfObject = sizeof($getRefereeDetails);
							$referenceList = "";

							if($sizeOfObject == 0){
								$educationList = '<div class="alert alert-warning">
													<p>Complete your CV to view your references here.</p>
												</div>	';
								echo $educationList;
							}

							for($i = 0; $i<$sizeOfObject; $i++) {
								$fname = $getRefereeDetails[$i]->fname;
								$lname = $getRefereeDetails[$i]->lname;
								$designation = $getRefereeDetails[$i]->designation;
								$organization = $getRefereeDetails[$i]->organization;
								$mobileNo = $getRefereeDetails[$i]->mobileNo;
								$website = $getRefereeDetails[$i]->website;
								$refereesEmail = $getRefereeDetails[$i]->refereesEmail;

								$referenceList = '<ul class="resume-lists">';
									$referenceList .= '<li>';
										$referenceList .= '<div class="education-name"><strong>'.$fname."  ".$lname .'</strong></div>';
										$referenceList .= '<span class="education-qualification"><i class="fa fa-fw fa-check"></i>&nbsp;Organization&nbsp;:&nbsp;'.$organization.'</span><br />';
										$referenceList .= '<span class="education-qualification"><i class="fa fa-fw fa-check"></i>&nbsp;Designation&nbsp;:&nbsp;'.$designation.'</span><br />';
										$referenceList .= '<span class="education-period"><i class="fa fa-fw fa-calendar"></i>&nbsp;Email&nbsp;:&nbsp;'.$mobileNo.'</span><br />';
										$referenceList .= '<span class="education-qualification"><i class="fa fa-fw fa-check"></i>&nbsp;Website&nbsp;:&nbsp'.$website.'</span>';
									$referenceList .= '</li>';
								$referenceList .= '</ul>';

								echo $referenceList;
							}
						?>
						<a href="#" class="btn btn-contact" data-toggle="modal" data-target="#contact-resume-modal" style="color:#ffffff;">Edit</a>
				</div><!-- /.education-container -->
				<hr/>
				<!-- <div class="experience-container">
					<h3 class="educations-title">URL(s)</h3>
					<ul class="resume-lists">
						<li>							
							<div class="education-name"><strong></strong></div>
							<span class="education-period">
								<i class="fa fa-fw fa-link"></i>&nbsp;<a href="" target="_blank">www.somesite.com</a>
							</span>
						</li>					</ul>
				</div> --><!-- /.experience-container -->
			</div><!-- /.col-md-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#content -->

<footer id="footer">
	<div id="footer-text" class="container">
		Developed By Sepia			
	</div><!-- /#footer-text -->
</footer><!-- /#footer -->
</div><!-- /#wrapper -->
