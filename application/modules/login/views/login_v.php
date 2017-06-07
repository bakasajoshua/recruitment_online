<div id="wrapper">
	<header id="header">
		<!-- <div id="header-bar">
			<div class="container">
				<ul class="jobboard-social-media">
					
				</ul> --><!-- /.social-media -->
				<!-- <div class="jobboard-login-register clearfix">
					<a class="btn btn-header-register" href="<?php echo base_url('register/signup'); ?>">REGISTER</a>
				</div> -->
			<!-- </div>/.container -->
		<!-- </div> --><!-- /#header-bar -->			
		<?php //$this->load->view('template/menu_v'); ?> 
	</header><!-- /#header -->

	<div id="page-title-wrapper" class="login-page-wrapper">
		<div class="container">
			<h1 class="page-title">
				Homepage
			</h1>
			<div class="row">
				<div class="col-md-5">
					<div id="login-form-wrapper" class="no-animated" style="border-radius: 0px;">
						<form id="login-form" action="#" method="post">							
							<div  id="alertTag">
							
							</div>
							<?php 
								if(isset($_GET['m'])){
									if($_GET['m'] == 1){
							?>
										<div class="alert alert-danger" id="getAlert">
											<center>
												<strong>Please login to view this page.</strong> <br/>
											</center>
										</div>
							<?php
									// }else if($_GET['m'] == 2){
							?>	
									<div class="alert alert-danger" id="getAlert">
										<center>
											<strong>Please login to view this page.</strong> <br/>
										</center>
									</div>
							<?php
									}else{}
								}
							?>
							<script type="text/javascript">
								setTimeout(function(){
									$("#getAlert").hide();
								},10000);
							</script>
							<div class="col-md-3">
								<label for="user_login">Email</label>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input class="form-control" type="text" name="the_user_login" id="user_login" placeholder="Email Address" required="required" />
								</div>
							</div><!-- /.form-group -->
							<div class="col-md-3">
								<label for="user_password">Password</label>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input class="form-control" type="password" name="the_user_password" id="user_password" placeholder="Password" />
								</div><!-- /.form-group -->
							</div>
							<input type="hidden" name="action" value="jobboard_proccess_login_form" />
							<div class="clearfix"></div>
							<center><button type="submit" name="user_submit" id="user_submit" value="1" class="btn btn-login"  style="border-radius: 0px;">Log in</button></center>
							<hr>
							<div>
								<center style="">
									Don't have an account?<a class="lost-password-link" href="<?php echo base_url('register/signup'); ?>">Register</a>
									<a class="lost-password-link" href="<?php echo base_url('login/forgotPassword'); ?>">Lost password?</a>
								</center>
							</div>
							
						</form>
					</div><!-- /.login-form-wrapper -->
				</div><!-- /.col-md-5 -->
				<div class="col-md-7">
					<div class="post-105 page type-page status-publish hentry">
						<article id="page-105">
							<h3 class="default-widget-title">WELCOME TO KIPPRA RECRUITMENT PORTAL</h3>
							<p>The Kenya Institute for Public Policy Research and Analysis (KIPPRA) is an autonomous public institute that was established in May 1997 through a Legal Notice and commenced operations in June 1999. In January 2007,His Excellency the President signed the KIPPRA Bill into law and the KIPPRA Act No. 15 of 2006 commenced on 1st February 2007.</p>
							<ul class="sc-ul">
								<li>
									<i style="color:#1abc9c" class="fa fa-fw fa-arrow-right"></i> Provide your login details here
								</li>
								<li>
									<i style="color:#1abc9c" class="fa fa-fw fa-arrow-right"></i> Login and fill your personal and qualification details and attach required documents
								</li>
								<li>
									<i style="color:#1abc9c" class="fa fa-fw fa-arrow-right"></i> Go to vacancies and apply for the advertised positions
								</li>
							</ul>
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

<script type="text/javascript" src="<?php echo base_url("assets/customScripts/loginUser.js"); ?>"></script>
<script type="text/javascript">
	$loginUserURL = "<?php echo base_url("login/loginUser");?>";
	$redirectToHomePage = "<?php echo base_url("info"); ?>";
</script>
