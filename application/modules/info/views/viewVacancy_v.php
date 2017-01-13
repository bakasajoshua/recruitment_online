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
		<?php $this->load->view('template/menu_v'); ?>
	</header><!-- /#header -->

	<div id="job-detail" class="post-79 job type-job status-publish hentry job_category-accountingfinance job_category-website job_type-full-time job_region-nairobi">
		<div class="container">
			<h1 class="job-detail-title">
				Job Detail
			</h1>
			<div class="company-job-detail clearfix">
				<div class="company-logo">
					<a href="http://zury.co.ke/kippra/company/codecanyon/"></a>			
				</div><!-- /.company-logo -->
				<div class="company-details">
					<span class="company-website">
						<i class="fa fa-fw fa-chain"></i>
						<a href="" target="_blank">Website</a>
					</span><!-- /.company-website -->
					<span class="company-twitter">
						<i class="fa fa-fw fa-twitter"></i>
						<a href="http://www.twitter.com" target="_blank">Twitter</a>
					</span><!-- /.company-twitter -->
					<span class="company-facebook">
						<i class="fa fa-fw fa-facebook"></i>
						<a href="http://www.facebook.com" target="_blank">Facebook</a>
					</span><!-- /.company-facebook -->
					<span class="company-google-plus">
						<i class="fa fa-fw fa-google-plus"></i>
						<a href="http://www.googleplus.com" target="_blank">Google+</a>
					</span><!-- /.company-google-plus -->
				</div><!-- /.company-details -->
			</div><!-- /.company-job-detail -->

			<div class="the-job-details clearfix">
				<div class="the-job-title">
					<h3>
						<?php
							$vacancyDetails = (array)$vacancyDetails;

							$vacancyDetails = json_decode($vacancyDetails[0]);
							echo($vacancyDetails[0]->jobTitle);
						?>
					</h3>
					<p>Join our Business intelligence team! </p>
				</div><!-- /.the-job-title -->
				<div class="the-job-company">
					KIPPRA			
				</div><!-- /.the-job-company -->
				<div class="the-job-location">
					<i class="fa fa-fw fa-map-marker"></i>
					<?php
						echo($vacancyDetails[0]->location);
					?>		
				</div><!-- /.the-job-location -->
				<div class="the-job-type">
					<i class="fa fa-fw fa-user"></i>
					<?php
						echo($vacancyDetails[0]->workSchedule);
					?>				
				</div><!-- /.the-job-type -->
				<div class="the-job-button">
					<button class="btn btn-apply-job " type="submit" value="1" data-toggle="modal" data-target="#apply-job-modal">Apply</button>
				</div><!-- /.the-job-button -->
			</div><!-- /.the-job-details -->

		
		<div class="the-job-aditional-details">
			<span class="the-job-aditional-title job-cat-links">Category : 
				<a href="http://zury.co.ke/kippra/job_category/accountingfinance/">Accounting/Finance</a>
			</span>
		
			<span class="the-job-aditional-title">
				Salary : 
				<?php 
					Salary: echo $vacancyDetails[0]->salary;
				?>
			</span>

			<span class="the-job-aditional-title">
				Experience(s) : 
				<?php 
					echo $vacancyDetails[0]->workExperience;
				?>
				&nbsp;Year(s)</span>
		</div><!-- /.the-job-aditional-details -->

		<div id="job-description" class="row">
			<div class="col-md-6">
				<article id="job-overview-79">
					<h1>Job Description</h1>
					<p>
						<?php 
							echo $vacancyDetails[0]->jobDescription;
						?>					
					</p>
				</article><!-- /#job-overview-79 -->
			</div><!-- /.col-md-6" -->
		</div><!-- /#job-description -->
	</div><!-- /.container -->
</div><!-- /#job-detail -->

<div id="job-content-79" class="the-job-content">
	<div class="container">
		<article>
			<!-- Competencies Requiered -->
			<?php
				$vacancyAdditionalInfo = (array)$vacancyAdditionalInfo;
				$vacancyAdditionalInfo = json_decode($vacancyAdditionalInfo[0]);

				$Competencies = "<p><strong> Competencies Required</strong><br/><br/>";
				foreach ($vacancyAdditionalInfo as $key => $value) {
					if($value->JCDDesc == ""){
						$Competencies .= "• None <br/>";
						break;
					}else{
						$Competencies .= "• ".$value->JCDDesc."<br/>";
					}
				}
				echo $Competencies;
			?>
			<!-- Competencies Requiered -->

			<!-- Performance Requiered -->
			<?php
				$Performance = "<p><strong> Performance Qualities Required</strong> <br/><br/>";
				foreach ($vacancyAdditionalInfo as $key => $value) {
					if($value->JPDDesc == ""){
						$Performance .= "• None <br/>";
						break;
					}else{
						$Performance .= "• ".$value->JPDDesc."<br/>";
					}
				}
				echo $Performance;
			?>
			<!-- Performance Requiered -->

			<!-- Qualifications Requiered -->
			<?php
				$Qualifications = "<p><strong> Qualifications Required </strong><br/><br/>";
				foreach ($vacancyAdditionalInfo as $key => $value) {
					if($value->JQDDesc == ""){
						$Qualifications .= "• None <br/>";
						break;
					}else{
						$Qualifications .= "• ".$value->JQDDesc."<br/>";
					}
				}
				echo $Qualifications;
			?>
			<!-- Qualifications Requiered -->

			<!-- Skills Requiered -->
			<?php
				$Skills = "<p><strong> Skills Required </strong><br/><br/>";
				foreach ($vacancyAdditionalInfo as $key => $value) {
					if($value->JSDDesc == ""){
						$Skills .= "• None <br/>";
						break;
					}else{
						$Skills .= "• ".$value->JSDDesc."<br/>";
					}
				}
				echo $Skills;
			?>
			<!-- Skills Requiered -->
		</article>
	</div>
</div><!-- /.the-job-content -->




	<!-- Modal Apply Job -->
	<div class="modal fade" id="apply-job-modal" tabindex="-1" role="dialog" aria-labelledby="jobboard-modal-label" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="jobboard_apply_job">Web Analyst - KIPPRA</h4>
				</div><!-- /.modal-header -->

				<div class="modal-body">
					<div class="alert alert-warning" role="alert">
						You need to create resume first to apply this job. Click 
						<a href="http://zury.co.ke/kippra/job/web-analyst/">Here</a> to add new resume.				
					</div>
				</div><!-- /.modal-body -->

				<div class="modal-footer"></div><!-- /.modal-footer -->
			</div><!-- ./modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal fade -->
	<!-- /.Modal Apply Job -->

	<footer id="footer">
		<div id="footer-text" class="container">
			Developed By Sepia			
		</div><!-- /#footer-text -->
	</footer><!-- /#footer -->
</div><!-- /#wrapper -->
