<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title>Homepage &#8211; Kippra Recruitment Portal</title>

		<style type="text/css">
			img.wp-smiley,
			img.emoji {
				display: inline !important;
				border: none !important;
				box-shadow: none !important;
				height: 1em !important;
				width: 1em !important;
				margin: 0 .07em !important;
				vertical-align: -0.1em !important;
				background: none !important;
				padding: 0 !important;
			}
	        .overlay{
	          position: absolute;
	          top: 0;
	          left: 0;
	          width: 100%;
	          height: 1000em;
	          z-index: 10;
	          background-color: rgba(0,0,0,0.5); /*dim the background*/
	        }
		</style>
		<!-- Font -->
		<link rel='stylesheet' id='nunito-font-css'  href='<?php echo base_url('assets/googleFont/nunito.css'); ?>' type='text/css' media='all' />
		<!-- Font -->

		<!-- Bootstrap v3.2.0-->
		<link rel='stylesheet' id='bootstrap-css'  href='<?php echo base_url('assets/bootstrap/bootstrap.min.css'); ?>' type='text/css' media='all' />
		<!-- Bootstrap -->

		<!-- Font Awesome v4.1.0 -->
		<link rel='stylesheet' id='font-awesome-css'  href='<?php echo base_url('assets/fontawesome/font-awesome.min.css'); ?>' type='text/css' media='all' />
		<!-- Font Awesome -->

		<!-- Default Style -->
		<link rel='stylesheet' id='default-css'  href='<?php echo base_url('assets/basics/style.css'); ?>' type='text/css' media='all' />
		<link rel='stylesheet' id='default-responsive-css'  href='<?php echo base_url('assets/basics/style-responsive.css'); ?>' type='text/css' media='all' />
		<!-- Default Style -->

		<!--Datatables -->
		<link href="<?php echo base_url('assets/datatables/media/css/dataTables.jqueryui.css'); ?>" rel="stylesheet" type="text/css">
		<!-- <link href="<?php echo base_url('assets/datatables/media/css/jquery-ui.css'); ?>" rel="stylesheet" type="text/css"> -->
		<link href="<?php echo base_url('assets/datatables/media/css/jquery-ui-2.css'); ?>" rel="stylesheet" type="text/css">
		<!--Datatables -->

		<!-- jQUery v1.11.2-->
		<script src="<?php echo base_url('assets/basics/jquery.min.js'); ?>"></script>
		<!-- jQUery -->

		<!-- Custom Scripts -->
		<script type="text/javascript" src="<?php echo base_url('assets/customScripts/uploadResume.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/customScripts/viewVacancy.js'); ?>"></script>
		<!-- Custom Scripts -->
		<style type="text/css" id="application-status-color"></style>
	</head>

	<body class="page page-id-105 page-template page-template-page-templates page-template-template-login page-template-page-templatestemplate-login-php jobboard">
		<div class="overlay">
            <img src="<?php echo base_url('assets/images/ring-alt.gif');?>" style=" display:block;margin:auto; padding-top: 25%;">
        </div>
		<!-- Content View-->
		<?php $this->load->view($content_view); ?>
		<!-- Content View-->

		<!-- Validate JS -->
		<script src="<?php echo base_url('assets/multistepForm/validate.js'); ?>"></script>
		<!-- Validate JS -->	
		<script type="text/javascript" src="<?php echo base_url("assets/bootstrap/bootstrap.min.js"); ?>"></script>

		<!--Datatables-->
		<script src="<?php echo base_url('assets/datatables/media/js/jquery.dataTables.min.js'); ?> " type="text/javascript"></script>
		<script src="<?php echo base_url('assets/datatables/media/js/dataTables.bootstrap.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/datatables/media/js/dataTables.jqueryui.min.js'); ?> " type="text/javascript"></script>
		<!--Datatables-->
		<script type="text/javascript">
			$("#vacanciesTable").dataTable();
			$loginStatus = '<?php echo $this->session->userdata('logged_in') ?>'; 
			$(".overlay").hide();
			
			window.validatePassword = function($password){
				var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
				var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
				$response = '';
				if(strongRegex.test($password) == false){//check if the password meets strong password standards
					if(mediumRegex.test($password) == false){//check if password meets medium password standards
						//this password is too week
						$response = 1;
						//console.log("//this password is too week");
					}else{
						//this password passes the medium password standard
						$response = 0;
					}
				}else{
					//this password is OK
					$response = 0;
				}
				return $response;
			}
		</script>
	</body>
</html>