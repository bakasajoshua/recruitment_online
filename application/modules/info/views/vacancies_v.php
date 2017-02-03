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
					<table class="table table-striped" id="vacanciesTable">
						<thead>
							<tr>
								<th>#</th>
			                    <th>Job Title</th>
			                    <th>Job Description</th>
			                    <th>Job Location</th>
			                    <th>Work Schedule</th>
			                    <th>View dDtails</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$vacancies = json_decode($vacancies);
								$rows = "";
								$i = 0;
								foreach ($vacancies as $key => $value) {
									$i++;
									$value = (array)$value;
									$rows = '<tr>';
									$rows .= '<td>'.$i.'</td>';
									$rows .= '<td>'.$value['jobTitle'].'</td>';
									$rows .= '<td>'.$value['jobDescription'].'</td>';
									$rows .= '<td><i class="fa fa-fw fa-map-marker"></i> &nbsp;&nbsp;&nbsp;'.$value['location'].'</td>';
									$rows .= '<td> <i class="fa fa-fw fa-user"></i> &nbsp;&nbsp;&nbsp;'.$value['workSchedule'].'</td>';
									$rows .= '<td> <a href= '.base_url("info/viewVacancy/vacancydetails/".$value['adID']).' class="btn btn-view-job">View Job</a> </td>';
									$rows .= '</tr>';
									echo $rows;
								}
							?>
						</tbody>
					</table>		
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