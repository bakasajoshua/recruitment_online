<div id="wrapper">
	<header id="header">
		<!-- loads the avatar section -->
		<?php
			$email =  $this->session->userdata('Email');
			$username = $this->session->userdata('username');
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
				<div  id="alertTag">
							
				</div>
	  			<p>
				    <label for="email">Email</label>
				    <input id="email" type="text" disabled="disabled" name="email" value="<?php echo $email; ?>" class="form-control"/>
	  			</p>

	  			<p>
				    <label for="username">Username:</label>
				    <input id="username" type="text" name="username" value="<?php echo $username; ?>" class="form-control"/>
	  			</p>	

	  			<p>
				    <label for="currentPass">Confirm Current Password: </label>
				    <input id="currentPass" type="password" name="currentPass" value="" class="form-control"/>
				</p>

	  			<p>
				    <label for="newPassword">New password: </label>
				    <input id="newPassword" type="password" name="newPassword" value="" class="form-control"/>
	  			</p>

			  	<p>
			    	<label for="confirmNewPass">Confrim New password: </label>
			    	<input id="confirmNewPass" type="password" name="confirmNewPass" value="" class="form-control"/>
			  	</p>

				<p>
					<button type="button" id="UpdateDetails" name="update_user" value="1" class="btn btn-send-contact-form">
						Update Profile
					</button>
				</p>
			</form>
		</div><!-- /.content -->
	</div><!-- /#content -->
	<footer id="footer">
		<div id="footer-text" class="container">
			Developed By Sepia			
		</div><!-- /#footer-text -->
	</footer><!-- /#footer -->
	<script type="text/javascript">
		$updateUserAccountDetails = "<?php echo base_url('home/accountSettings/updateAccountDetails');?>";
	</script>
	<script type="text/javascript" src="<?php echo base_url('assets/customScripts/accountSettings.js') ?>"></script>

</div><!-- /#wrapper -->
