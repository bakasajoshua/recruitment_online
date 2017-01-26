<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class ForgotPassword extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['content_view'] = 'login/forgotPassword_v';
		$this->load->view('template/template_v.php',$data);
	}

	public function confirmUser()
	{

	}

	function email_test_template()
	{
		$FName = "KIPPRA";
		$LName = "ESS";
		//person sending email

		//Subject of the Email
		$subject = "WELCOME TO KIPPRA RECRUITMENT PORTAL";

		// $From = "kipprahr@kippra.or.ke";
		$From = "kippraess@gmail.com";
		$to = 'baksajoshua09@gmail.com';

		$resp = $this->phpMailerSendMail($FName, $LName, $subject, $this->email_template(), $From, $to);
	}

	function email_template()
	{
		return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- If you delete this meta tag, Half Life 3 will never be released. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>KIPPRA</title>
	
</head>
 
<body bgcolor="#FFFFFF">

<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

			<div class="content">
			<table>
				<tr>
					<td>
						<h3>Hi, Elijah Baily</h3>
						<p class="lead">Phasellus dictum sapien a neque luctus cursus. Pellentesque sem dolor, fringilla et pharetra vitae.</p>
						<p>Phasellus dictum sapien a neque luctus cursus. Pellentesque sem dolor, fringilla et pharetra vitae. consequat vel lacus. Sed iaculis pulvinar ligula, ornare fringilla ante viverra et. In hac habitasse platea dictumst. Donec vel orci mi, eu congue justo. Integer eget odio est, eget malesuada lorem. Aenean sed tellus dui, vitae viverra risus. Nullam massa sapien, pulvinar eleifend fringilla id, convallis eget nisi. Mauris a sagittis dui. Pellentesque non lacinia mi. Fusce sit amet libero sit amet erat venenatis sollicitudin vitae vel eros. Cras nunc sapien, interdum sit amet porttitor ut, congue quis urna.</p>
						<!-- Callout Panel -->
						<p class="callout">
							Phasellus dictum sapien a neque luctus cursus. Pellentesque sem dolor, fringilla et pharetra vitae. <a href="#">Click it! &raquo;</a>
						</p><!-- /Callout Panel -->					
					</td>
				</tr>
			</table>
			</div><!-- /content -->
									
		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->


</body>
</html>';
	}
}
