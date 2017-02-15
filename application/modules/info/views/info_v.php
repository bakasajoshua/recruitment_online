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

	<div id="page-title-wrapper">
		<div class="container">
			<h1 class="page-title">Guidance steps</h1>
		</div><!-- /.container -->
	</div><!-- /#page-title -->

	<div id="content" class="post-271 page type-page status-publish hentry">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<article>
						<h3><span style="color: #339966;">Please read below before proceeding</span></h3>
						<p><strong>Click on "Post your Details" link under the "Personal Details" menu at the top.</strong><<br /></p>
						
						<p><strong>Fill in Personal Details, Qualifications, Employment History, Referees and attach your resume(CV) and an application letter.</strong></p>

						<p><strong>Click on "Vacancies" link to see available vacancies</strong></p>

						<p><strong>Apply for a position you are qualified for</strong></p>

						<p><strong>Ensure you submit your application by clicking on the submit button.</strong><br />
						A confirmation will be sent to your email once your application is received within 15 minutes</p>
						
					</article>
				</div><!-- /.col-md-8 -->
			
				<div class="col-md-4">
					<aside id="sidebar-default" class="sidebar">
						<div id="nav_menu-2" class="widget widget_nav_menu">
							<h3 class="default-widget-title">Careers</h3>
							<div class="menu-menu-1-container">
								<ul id="menu-menu-2" class="menu">
								<?php
									if($this->session->userdata('logged_in') == 1){
								?>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-219">
										<a href="<?php echo base_url('info/vacancies'); ?>">Home</a>
									</li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-184 current_page_item menu-item-has-children menu-item-226">
										<a href="#">Personal Details</a>
										<ul class="sub-menu">
											<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-223">
												<a href="<?php echo base_url('home/uploadResume'); ?>">Post Your CV</a>
											</li>
										</ul>
									</li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-232">
										<a href="<?php echo base_url('info/vacancies'); ?>">Vacancies</a>
									</li>
								<?php 
									}else {
								?>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-272">
										<a href="<?php echo base_url('login'); ?>">Login</a>
									</li>
								<?php
									}
								?>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-272">
										<a href="<?php echo base_url('info/faqs'); ?>">FAQ&#8217;s</a>
									</li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-272">
										<a href="<?php echo base_url('info/contactUs'); ?>">Contact&nbsp;Us</a>
									</li>
								</ul>
							</div>
						</div>
						<div id="text-2" class="widget widget_text">
							<div class="textwidget">
								<strong>
									<p>NB:Only Online Applications are accepted.</p>
								</strong>
							</div>
						</div>	
					</aside><!-- /#sidebar-default -->
				</div><!-- /.col-md-4 -->	
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /#content -->

	<footer id="footer">
			<div id="footer-text" class="container">
				Developed By Sepia			
			</div><!-- /#footer-text -->
	</footer><!-- /#footer -->
</div><!-- /#wrapper -->
