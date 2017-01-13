<div id="wrapper">
	<header id="header">
		<div id="header-bar">
			<div class="container">
				<ul class="jobboard-social-media"></ul><!-- /.social-media -->
				<div class="jobboard-login-register clearfix">
					<a class="btn btn-header-login" href="<?php echo base_url('login/login/'); ?>">LOG IN</a>
				</div>
			</div><!-- /.container -->
		</div><!-- /#header-bar -->			
		<?php $this->load->view('template/menu_v'); ?>
	</header><!-- /#header -->

	<div id="page-title-wrapper" class="register-page-wrapper">
		<div class="container">
			<h1 class="page-title">Register</h1>
			<div class="row">
				<div class="col-md-5">
					<div id="register-form-wrapper" class="">
						<form id="register-form" method="post">
						<p style="color:#ffffff;" id="alertTag"></p>
							<div class="form-group">
								<input class="form-control" type="text" name="register_name" id="register_name" placeholder="Username" required="required" />
							</div><!-- /.form-group -->
							<div class="form-group">
								<input class="form-control" type="email" name="register_email" id="register_email" placeholder="Email" required="required" />
							</div><!-- /.form-group -->
							<div class="form-group">
								<input class="form-control" type="password" name="register_password" id="register_password" placeholder="Password" required="required" />
							</div><!-- /.form-group -->
							<div class="form-group">
								<input class="form-control" type="password" name="confirm_register_password" id="confirm_register_password" placeholder="Confirm Password" required="required" />
							</div><!-- /.form-group -->
							<button type="button" name="user_submit" id="user_submit" value="1" class="btn btn-register">Register</button>
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
							<p>&nbsp;</p>
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
</script>