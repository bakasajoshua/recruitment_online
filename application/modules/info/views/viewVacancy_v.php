<div id="wrapper">
	<header id="header">
		<!-- loads the avatar section -->
		<?php
			$vacancyDetails = (array)$vacancyDetails;
			$vacancyDetails = json_decode($vacancyDetails[0]);

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
				<input type="hidden" id="jobADID" value="<?php echo $vacancyDetails[0]->adID; ?>" ></span>
			</h1>

			<div id="alertTag">
			</div>

			<div class="the-job-details clearfix">
				<div class="the-job-title">
					<h3>
						<?php
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
				<?php
					if ($applied==NULL) {
				?>
				<div class="the-job-button">
					<button class="btn btn-apply-job " type="submit" value="1" data-toggle="modal" id="ApplyForPosition">Apply</button>
				</div><!-- /.the-job-button -->
				<?php
					}
				?>
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
				<span id="yearsOfExperience">
				<?php 
					echo $vacancyDetails[0]->workExperience;
				?>
				</span>
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
				$vacancyCompetencyDetails = (array)$vacancyCompetencyDetails;
				$vacancyCompetencyDetails = json_decode($vacancyCompetencyDetails[0]);

				$Competencies = "<p><strong> Competencies Required</strong><br/><br/>";
				if(sizeof($vacancyCompetencyDetails) == 0){
					$Competencies .= "• None <br/>";			
				}else{
					foreach ($vacancyCompetencyDetails as $key => $value) {
						$description = $value->description;
						$Competencies .= "• ".$description."<br/>";
					}
				}
				echo $Competencies;				
			?>
			<!-- Competencies Requiered -->

			<!-- Performance Requiered -->
			<?php
				$vacancyPerformanceDetails = (array)$vacancyPerformanceDetails;
				$vacancyPerformanceDetails = json_decode($vacancyPerformanceDetails[0]);
				$Performance = "<p><strong> Performance Qualities Required</strong> <br/><br/>";
				if(sizeof($vacancyPerformanceDetails) == 0){
					$Performance .= "• None <br/>";				
				}else{
					foreach ($vacancyPerformanceDetails as $key => $value) {
						$description = $value->description;
						$Performance .= "• ".$description."<br/>";
					}
				}
				echo $Performance;				
			?>
			<!-- Performance Requiered -->

			<!-- Qualifications Requiered -->
			<?php
				$vacancyQualificationDetails = (array)$vacancyQualificationDetails;
				$vacancyQualificationDetails = json_decode($vacancyQualificationDetails[0]);

				$Qualifications = "<p><strong> Academic Qualifications Required </strong><br/><br/>";
				if(sizeof($vacancyQualificationDetails) == 0){
					$Qualifications .= "• None <br/>";					
				}else{
					foreach ($vacancyQualificationDetails as $key => $value) {
						$description = $value->description;
						$Qualifications .= "• ".$description."<br/>";
					}
				}
				echo $Qualifications;
			?>
			<!-- Qualifications Requiered -->

			<!-- Skills Requiered -->
			<?php
				$vacancySkillsDescription = (array)$vacancySkillsDescription;
				$vacancySkillsDescription = json_decode($vacancySkillsDescription[0]);
				$Skills = "<p><strong> Skills Required </strong><br/><br/>";
				if(sizeof($vacancySkillsDescription) == 0){
					$Skills .= "• None <br/>";					
				}else{
					foreach ($vacancySkillsDescription as $key => $value) {
						$description = $value->description;
						$Skills .= "• ".$description."<br/>";
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
						You need to be logged in first to apply for this position. Click
						<a href="<?php echo base_url('login'); ?>">Here</a> to login.
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

<script type="text/javascript">
	$makeApplicationURL = '<?php echo base_url('info/viewVacancy/makeJobApplication'); ?>';
</script>