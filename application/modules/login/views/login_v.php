<div id="wrapper">
	<header id="header">
		<div id="header-bar">
			<div class="container">
				<ul class="jobboard-social-media">
					
				</ul><!-- /.social-media -->
				<div class="jobboard-login-register clearfix">
					<a class="btn btn-header-register" href="<?php echo base_url('register/signup'); ?>">REGISTER</a>
				</div>
			</div><!-- /.container -->
		</div><!-- /#header-bar -->			
		<?php $this->load->view('template/menu_v'); ?>
	</header><!-- /#header -->

	<div id="page-title-wrapper" class="login-page-wrapper">
		<div class="container">
			<h1 class="page-title">
				Homepage
			</h1>
			<div class="row">
				<div class="col-md-5">
					<div id="login-form-wrapper" class="no-animated">
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
									}else if($_GET['m'] == 2){
							?>	
									<div class="alert alert-success" id="getAlert">
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
							<div class="form-group">
								<input class="form-control" type="text" name="the_user_login" id="user_login" placeholder="Email Address" required="required" />
							</div><!-- /.form-group -->
							<div class="form-group">
								<input class="form-control" type="password" name="the_user_password" id="user_password" placeholder="Password" />
							</div><!-- /.form-group -->
							<input type="hidden" name="action" value="jobboard_proccess_login_form" />
							<div class="clearfix"></div>
							<button type="submit" name="user_submit" id="user_submit" value="1" class="btn btn-login">Log in</button>					
							<a class="lost-password-link" href="<?php echo base_url('login/forgotPassword'); ?>">Lost password?</a>
						</form>
					</div><!-- /.login-form-wrapper -->
				</div><!-- /.col-md-5 -->
				<div class="col-md-7">
					<div class="post-105 page type-page status-publish hentry">
						<article id="page-105">
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
	$redirectToHomePage = "<?php echo base_url(); ?>";
</script>
