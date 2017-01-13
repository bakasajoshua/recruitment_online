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

		<!--  loads the menu -->
		<?php $this->load->view('template/menu_v'); ?>
	</header><!-- /#header -->

	<div id="job-search">
		<div class="container">
			<div class="job-search-wrapper">
				<h2 class="job-search-title">
					<span class="fa fa-search"></span> &nbsp;
					Find a Job
				</h2>
				<form id="job-search-form" role="form" action="" method="POST">

					<div id="search-text-input" class="row">
						<div class="col-md-7">
							<div class="form-group has-feedback">
								<label class="text-label" for="keyword">Search According To:</label>
								<select class="form-control" name="searchAccordingTo" id="searchAccordingTo">
									<option value="">Select</option>
      								<option value="Location">Location</option>
      								<option value="JobTitle">Job title</option>
      								<option value="Salary">Salary</option>
								</select>
							</div>
						</div>
						<!-- Search by Location -->
						<div class="col-md-5" id="searchByLocationDiv">
							<div class="form-group has-feedback">
								<label class="text-label" for="searchByLocation">Location</label>
								<select class="form-control" name="searchByLocation" id="searchByLocation">
									<option value="">Select a location</option>
      								<option value="Location 1">Location 1</option>
      								<option value="Location 1">Location 2</option>
								</select>
							</div>
						</div>
						<!-- Search by Location -->
						<!-- Search by Job Title -->
						<div class="col-md-5" id="searchByJobTitleDiv">
							<div class="form-group has-feedback">
								<label class="text-label" for="searchByJobTitle">Job Title</label>
								<select class="form-control" name="searchByJobTitle" id="searchByJobTitle">
									<option value="">Select a job title</option>
      								<option value="Title1">Title 1</option>
      								<option value="Title2">Title 2</option>
								</select>
							</div>
						</div>
						<!-- Search by Job Title -->
						<!-- Search by salary -->
						<div class="col-md-5" id="searchBySalaryDiv">
							<div class="form-group has-feedback">
								<label class="text-label" for="searchBySalary">Salary</label>
								<select class="form-control" name="searchBySalary" id="searchBySalary">
									<option value="">Select a salary range</option>
      								<option value="50000 - 100000">50 000 - 100 000</option>
      								<option value="20000 - 50000">20 000 - 50 000</option>
								</select>
							</div>
						</div>
						<!-- Search by Job Title -->
					</div><!-- /.row -->

					<div id="search-btn-wrap" class="row">
						<div class="col-md-8">
						</div>
						<div class="col-md-4 search-btn-group">						
							<button class="btn btn-default btn-job-search" id="searchJobVacancies" value="true">Search</button>
						</div><!-- /.col-md-9 -->
					</div><!-- /.row -->
				</form><!-- /#job-search-form -->
			</div><!-- /.job-search-wrapper -->
		</div><!-- /.container -->
	</div><!-- /#job-search -->

	<div id="jobs-listing" class="related-job-listing featured-job">
		<div class="container">
			<div class="jobs-listing-title">
				<h3>
					<i class="fa fa-briefcase"></i>
					Jobs Search Result			
				</h3>
			</div>
			<div class="jobs-search-wrapper">
				<div id="all_jobs">
					<?php 
						$vacancies = json_decode($vacancies);
						$row = "";
						foreach ($vacancies as $key => $value) {
		                    $value = (array)$value;
		                    // print_r($value);die;
		                    $row = '<div class="job-listing-row clearfix">
										<div class="job-listing-name">';
							$row .= '<h4>'.$value['jobTitle'].'</h4>
										<p class="job-listing-summary">'.$value['jobDescription'].'</p>
									</div>';
							$row .= '<div class="job-listing-region">
										<i class="fa fa-fw fa-map-marker"></i>
										'.$value['location'].'
									</div>';
							$row .= '<div class="job-listing-type hidden-sm hidden-xs">
										<i class="fa fa-fw fa-user"></i>
										'.$value['workSchedule'].'
									</div>';
							$row .= '<div class="job-listing-view">
											<a href= '.base_url("info/viewVacancy/vacancydetails/".$value['adID']).' class="btn btn-view-job">View Job</a>
										</div>
									</div>';
									//<a href= '.base_url("info/viewVacancy").' class="btn btn-view-job">View Job</a>
							echo $row;
		                }
					?>
					<div class="dashboard-pagination"></div><!-- /.dashboard-pagination -->				
				</div><!-- /#all_jobs -->
			</div><!-- /.jobs-listing-wrapper -->
		</div><!-- /.container -->
	</div><!-- /#jobs-listings -->

	<footer id="footer">
		<div id="footer-text" class="container">
			Developed By Sepia			
		</div><!-- /#footer-text -->
	</footer><!-- /#footer -->
</div><!-- /#wrapper -->


<script>
	$filterVacanciesURL = "<?php echo base_url('info/vacancies/filterVacancies'); ?>";
</script>
<script src="<?php echo base_url('assets/customScripts/vacancies.js'); ?>" ></script>