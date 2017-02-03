<div id="header-bar">
	<div class="container">
		<ul class="jobboard-social-media"></ul><!-- /.social-media -->
		<div class="jobboard-login-register clearfix">
			<div class="user_menu dropdown">
				<a data-toggle="dropdown" href="#">
					<img alt='' src='http://2.gravatar.com/avatar/5c31bff251f7ae657d32f986bd65d240?s=35&#038;d=mm&#038;r=g' srcset='http://2.gravatar.com/avatar/5c31bff251f7ae657d32f986bd65d240?s=70&amp;d=mm&amp;r=g 2x' class='avatar avatar-35 photo' height='35' width='35' />
					<span>
						Hi, 
						<?php 
							if($this->session->userdata('FirstName') !== ""){
								// echo "fname is not null";
								echo $this->session->userdata('FirstName')." ".$this->session->userdata('LastName');
							}else{
								// echo "fname is null";
								echo $this->session->userdata('username');
							}
						?>
					</span>
					<i class="fa fa-caret-down"></i>
				</a>				
				<div class="dropdown-menu clearfix" role="menu">
					<ul>
						<li>
							<a href="<?php echo base_url('home/myAccount'); ?>">Dashboard</a>
						</li>
						<li>
							<a href="<?php echo base_url('home/accountsettings'); ?>">Profile</a>
						</li>
						<li>
							<a href="<?php echo base_url('login/logout');  ?>">Log Out</a>									
						</li>
					</ul>
					<img alt='' src='http://2.gravatar.com/avatar/5c31bff251f7ae657d32f986bd65d240?s=70&#038;d=mm&#038;r=g' srcset='http://2.gravatar.com/avatar/5c31bff251f7ae657d32f986bd65d240?s=140&amp;d=mm&amp;r=g 2x' class='avatar avatar-70 photo' height='70' width='70' />				
				</div>
			</div><!-- /.user_menu -->
		</div>
	</div>
</div>