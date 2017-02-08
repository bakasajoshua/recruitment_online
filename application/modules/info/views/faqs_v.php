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
			<h1 class="page-title">FAQ&#8217;s</h1>
		</div><!-- /.container -->
	</div><!-- /#page-title -->

	<div id="content" class="post-271 page type-page status-publish hentry">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<article>
						<h3><span style="color: #339966;">Erecruitment Portal &#8211; Frequently Asked Questions</span></h3>
						<p><strong>Can I send my application through email?</strong><br />
						You may not send your application through email. This is an automated recruitment process and only online applications will be considered<br />
						<strong>The password I have selected is being rejected. Why?</strong><br />
						Passwords must meet the following criteria for security of your account</p>
						<p>A minimum of 8 characters long<br />
						Contain at least 1 capital letter<br />
						Contain at least 1 lower case letter<br />
						Contain at least 1 number<br />
						Contain a special character e.g. ! $ *<br />
						Cannot contain spaces<br />
						Examples: John@1996, Mary2016!</p>
						<p><strong>I have registered but have not received an activation email from the system</strong><br />
						Emails should be delivered within a maximum of 10mins. Please check your Junk/spam folder. If you do not receive an email at all, it is likely (though rare) that your registration was not completed successfully. In this case please register again.</p>
						<p><strong>I have logged in and I cannot see any Menus on the right</strong><br />
						Use a different browser e.g. Internet Explorer, Mozilla or Google Chrome. Your browser is blocking pop-ups/ java scripts.</p>
						<p>Also note that the first time you login, the system prompts you to change your password. You must do this in order to see the menus</p>
						<p><strong>I have forgotten my password / I am unable to login</strong><br />
						You can reset your password from the login page</p>
						<p><strong>I have clicked on the “Advertised Jobs” link but system is not responding</strong><br />
						Use a different browser e.g. Internet Explorer, Mozilla or Google Chrome. Your browser is blocking pop-ups/ java scripts.</p>
						<p><strong>The link on the website is not working</strong><br />
						Your browser blocks pop-ups or java scripts. Use a different browser e.g. Internet Explorer, Mozilla or Google Chrome. Also some computers will ask you to accept a security certificate before proceeding.</p>
						<p><strong>If I have submitted my application and I wish to have it back to change/add something</strong><br />
						You can save your application, the link is at the bottom of the page then continue later.</p>
						<p><strong>The link on the website is not working</strong><br />
						Use a different browser e.g. Internet Explorer, Mozilla or Google Chrome. Your browser is blocking pop-ups/ java scripts.</p>
						<p><strong>I am completely stuck, where can I seek assistance from</strong><br />
						If you have followed instructions on the portal carefully and still having difficulties using the portal, you can send an email seeking assistance to recruitment@kippra.or.ke or call 2264 400. In your email/call please describe exactly what challenge you are facing. Include screenshots where possible.</p>
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
