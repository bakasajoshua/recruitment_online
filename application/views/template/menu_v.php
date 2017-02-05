<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="logo-wrapper ">
				<a href="<?php echo base_url('home/myAccount'); ?>" class="header-logo" title="Kippra Recruitment Portal">
					<img src="<?php echo base_url('assets/images/kippralogo.png'); ?>" alt="Kippra Recruitment Portal" />
				</a>							
			</div><!-- /.logo-wrapper -->
		</div><!-- /.col-md-3 -->
		<div class="col-md-9">
			<div id="menu-wrapper">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-menu">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<nav id="main-menu" class="clearfix collapse navbar-collapse" role="navigation">
					<ul id="menu-menu-1" class="nav-menu">
						<?php
							$logInStatus = $this->session->userdata('logged_in');
							if($logInStatus == 1){//1 for true
								//prevent from seeing login page
						?>
							<li id="menu-item-226" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-226">
								<a href="#">Personal Details</a>
								<ul class="sub-menu">
									<li id="menu-item-223" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-223">
										<a href="<?php echo base_url('home/uploadResume'); ?>">Post Your Details</a>
										<a href="<?php echo base_url('home/viewCV'); ?>">Your CV</a>
									</li>
								</ul>
							</li>
						<?php
							}else{
						?>
							<li id="menu-item-232" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-232">
								<a href="<?php echo base_url('login'); ?>">Login</a>
							</li>						
						<?php
							}
						?>
						<?php
							$logInStatus = $this->session->userdata('logged_in');
							if($logInStatus == 1){//1 for true
								//prevent from seeing login page
						?>
						<li id="menu-item-232" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-232">
							<a href="<?php echo base_url('info/vacancies'); ?>">Vacancies</a>
						</li>
						<?php
							}
						?>
						<li id="menu-item-272" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-272">
							<a href="<?php echo base_url('info/faqs'); ?>">FAQ&#8217;s</a>
						</li>
						<li id="menu-item-272" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-272">
							<a href="<?php echo base_url('info/contactUs'); ?>">Contact&nbsp;Us</a>
						</li>
					</ul>
				</nav><!-- /#main-menu -->
			</div><!-- /#menu-wrapper -->
		</div><!-- /.col-md-9 -->
	</div><!-- /.row -->
</div><!-- /.container -->