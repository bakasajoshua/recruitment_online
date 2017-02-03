<div id="wrapper">
	<header id="header">
		<div id="header-bar">
			<div class="container">
				<ul class="jobboard-social-media"></ul><!-- /.social-media -->
				<div class="jobboard-login-register clearfix">
					<a class="btn btn-header-register" href="http://zury.co.ke/kippra/register/">REGISTER</a>
					<a class="btn btn-header-login" href="http://zury.co.ke/kippra/?redirect=http%3A%2F%2Fzury.co.ke%2Fkippra%2F">LOG IN</a>
				</div>
			</div><!-- /.container -->
		</div><!-- /#header-bar -->			
		<?php $this->load->view('template/menu_v'); ?>
	</header><!-- /#header -->

	<div id="page-title-wrapper" class="login-page-wrapper">
		<div class="container">
			<h1 class="page-title">
				Forgot Password
			</h1>

			<div class="row">
				<div class="col-md-5">
					<div id="login-form-wrapper" class="no-animated">
						<form name="lostpasswordform" id="login-form" action="http://zury.co.ke/kippra/wp-login.php?action=lostpassword" method="post">
							<div class="form-group">
								<input class="form-control" type="text" name="user_login" id="user_login" class="input" value="" placeholder="Username or Email"/>
							</div>
							<input type="hidden" name="redirect_to" value="http://zury.co.ke/kippra/?redirect=http%3A%2F%2Fzury.co.ke%2Fkippra%2Fhomepage%2F&amp;mode=lost-password&amp;reset=true" />
							<button type="submit" name="user_submit" id="user_submit" value="1" class="btn btn-login">Reset Password</button>
						</form>
					</div><!-- /.login-form-wrapper -->
				</div><!-- /.col-md-5 -->

				<div class="col-md-7">
					<div class="post-179 page type-page status-publish hentry">
						<article id="page-179">
							<h3 class="sc-title normal">Not A Member? Register Now</h3>
							<p>An email will be sent to the registered email address; Access email and click on link to activate your account</p>
							<p><a href="http://zury.co.ke/kippra/register/" target="_self" class="btn sc-button medium grey">REGISTER</a></p>
							<div class="row">
								<div class="col-sm-6 col-sm-offset-0">
									<ul class="sc-ul">
										<li>
											<i style="color:#1abc9c" class="fa fa-fw fa-arrow-right"></i> Login and fill your details and attach required documents
										</li>
										<li>
											<i style="color:#1abc9c" class="fa fa-fw fa-arrow-right"></i> Apply for the advertised position under Vacancies
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
