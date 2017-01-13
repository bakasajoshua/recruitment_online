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
	    <h1 class="page-title">Account Settings</h1>
	  </div><!-- /.container -->
	</div><!-- /#page-title -->

	<div id="content">
		<div class="container">
			<form action="#" method="post" class="frontend-form">
	  			<p>
				    <label for="username">Username (cannot be changed):</label>
				    <input id="username" type="text" disabled="disabled" name="username" value="demo1" class="form-control"/>
	  			</p>

	  			<p>
				    <label for="firstname">First Name: </label>
				    <input id="firstname" type="text" name="firstname" value="" class="form-control"/>
	  			</p>	

	  			<p>
				    <label for="lastname">Last Name: </label>
				    <input id="lastname" type="text" name="lastname" value="" class="form-control"/>
	  			</p>

			  	<p>
			    	<label for="website">Website: </label>
			    	<input id="website" type="text" name="website" value="" class="form-control"/>
			  	</p>

				<p>
				    <label for="email">Email: </label>
				    <input id="email" type="text" name="email" value="demo1@gmail.com" class="form-control"/>
				</p>

				<p>
				    <label for="password">New Password: </label>
				    <input id="password" type="password" name="password" value="" class="form-control"/>
				</p>

				<p>
					<label for="password_repeat">Repeat New Password: </label>
				    <input id="password_repeat" type="password" name="password_repeat" value="" class="form-control"/>
				 </p>

				<p>
					<button type="submit" name="update_user" value="1" class="btn btn-send-contact-form" data-loading-text="Updating...">
						Update Profile
					</button>
				</p>
	  			<input type="hidden" name="user_id" value="5" />
			</form>
		</div><!-- /.content -->
	</div><!-- /#content -->
	<footer id="footer">
		<div id="footer-text" class="container">
			Developed By Sepia			
		</div><!-- /#footer-text -->
	</footer><!-- /#footer -->
</div><!-- /#wrapper -->
