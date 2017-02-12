<div id="wrapper">
	<header id="header">
		<!-- <div id="header-bar">
			<div class="container">
				<ul class="jobboard-social-media"></ul> --><!-- /.social-media -->
				<!-- <div class="jobboard-login-register clearfix">
					<a class="btn btn-header-login" href="<?php echo base_url('login/login/'); ?>">LOG IN</a>
				</div>
			</div> --><!-- /.container -->
		<!-- </div> --><!-- /#header-bar -->			
		<?php $this->load->view('template/menu_v'); ?>
	</header><!-- /#header -->

	<div id="page-title-wrapper" class="register-page-wrapper">
		<div class="container">
			<h1 class="page-title">Register</h1>
			<div class="row">
				<div class="col-md-5">
					<div id="register-form-wrapper" class="" style="border-radius: 0px;background-color: #1abc9c;">
						<form id="register-form" method="post">
							<div  id="alertTag">
							
							</div>
							<div class="form-group">
								<label for="register_name">Username</label>
								<input class="form-control" type="text" name="register_name" id="register_name" placeholder="Username" required="required" />
							</div><!-- /.form-group -->
							<div class="form-group">
								<label for="register_email">Email</label>
								<input class="form-control" type="email" name="register_email" id="register_email" placeholder="Email" required="required" />
							</div><!-- /.form-group -->
							<div class="form-group">
								<label for="register_password">Password</label>
								<input class="form-control" type="password" name="register_password" id="register_password" placeholder="Password" required="required" />
							</div><!-- /.form-group -->
							<div class="form-group">
								<label for="confirm_register_password">Confirm Password</label>
								<input class="form-control" type="password" name="confirm_register_password" id="confirm_register_password" placeholder="Confirm Password" required="required" />
							</div><!-- /.form-group -->
							<button type="button" name="user_submit" id="user_submit" value="1" class="btn btn-register" style="    background-color: #A0E1D3; color: #1abc9c; border-radius: 0px;">Register</button>
						</form>
					</div><!-- /.login-form-wrapper -->
				</div><!-- /.col-md-5 -->
				<div class="col-md-7">
					<div class="post-181 page type-page status-publish hentry">
						<article id="page-181">
							<h3 class="sc-title normal">Already A Member? Log in Here</h3>
							<p>
								<a href="<?php echo base_url("login"); ?>" target="_self" class="btn sc-button medium grey">Log In</a>
							</p>
							<div class="row">
								<div class="col-sm-6 col-sm-offset-0">
									<ul class="sc-ul">
										<li>
											<i style="color:#1abc9c" class="fa fa-fw fa-arrow-right"></i> Provide your login details here
										</li>
										<li>
											<i style="color:#1abc9c" class="fa fa-fw fa-arrow-right"></i> You will receive an email with the login details
										</li>
										<li>
											<i style="color:#1abc9c" class="fa fa-fw fa-arrow-right"></i> Login and fill your personal and qualification details and attach required documents
										</li>
										<li>
											<i style="color:#1abc9c" class="fa fa-fw fa-arrow-right"></i> Go to vacancies and apply for the advertised positions
										</li>
									</ul>
								</div>
								<div class="col-sm-6 col-sm-offset-0">
									<ul class="sc-ul">
										<li>
											<i style="color:#1abc9c" class="fa fa-fw fa-arrow-right"></i>
											<p> 
												The Kenya Institute for Public Policy Research and Analysis (KIPPRA) is an autonomous public institute that was established in May 1997 through a Legal Notice and commenced operations in June 1999. In January 2007,His Excellency the President signed the KIPPRA Bill into law and the KIPPRA Act No. 15 of 2006 commenced on 1st February 2007.
											</p>
											<p>
												The Institute is thus an autonomous Think Tank established under an Act of Parliament.
											</p>
										</li>
									</ul>
								</div>
							</div>
						</article>
					</div><!-- /#content -->
				</div><!-- /.col-md-7 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /#page-title -->

	<footer id="footer">
		<div id="footer-text" class="container">
			Developed By Sepia			
		</div><!-- /#footer-text -->
	</footer><!-- /#footer -->
</div><!-- /#wrapper -->

<script type="text/javascript" src="<?php echo base_url('assets/customScripts/register.js'); ?>"></script>
<script>
	$registerURL = "<?php echo base_url('register/signup/saveuser'); ?>";
	$validateEmailURL = "<?php echo base_url('register/signup/validateEmail'); ?>";
	$redirectToLoginPage = "<?php echo base_url('login'); ?>";
</script>