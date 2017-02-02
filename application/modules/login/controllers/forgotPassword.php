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
		$forgot_email = $_POST['forgot_email'];
		$passCode = $this->passChangeCode();

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'FORGOTPASSWORD',
		        'forgot_email' => $forgot_email,
		       	'passChangeCode'=> $passCode
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		$message = array('name' => NULL,
							'messgae' => '<p>Your verification code is :<strong>'.$passCode.'</strong></p>' );
		$this->emailSendForgottenPassword($forgot_email,$this->email_template($message));
		echo($result);
	}

	function conform_code_exists()
	{
		$email = $_POST['email'];
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'DUPLICATEPASSREQ',
		        'forgot_email' => $email
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		// $this->emailSendForgottenPassword($forgot_email,$body);
		echo($result);
	}

	function resetPassword()
	{
		$data['content_view'] = 'login/resetPass_v';
		$this->load->view('template/template_v.php',$data);
	}

	function resetUser()
	{
		$emailAddress = $_POST['resetDetails'][0]['value'];
		$verification = $_POST['resetDetails'][1]['value'];
		$password = $_POST['resetDetails'][2]['value'];
		$password = sha1($password);
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'changePassword',
		        'email' => $emailAddress,
		        'password' => $password,
		       	'code'=> $verification
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		$result = json_decode($result);
		if (isset($result)) {
			$curl = curl_init();
			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => sqlnterfaceURL,
			    CURLOPT_USERAGENT => 'ESSDP',
			    CURLOPT_POST => 1,
			    CURLOPT_POSTFIELDS => array(
			        'action' => 'LOGINUSER',
			        'emailAddress' => $emailAddress,
			       	'password'=> $password
			    )
			));
			$result = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);
			$result = json_decode($result);
			
			
			if(isset($result[0]->fname)){
					$username = $result[0]->username;
					$email = $result[0]->email;
					$changePasswordRequest = $result[0]->changePasswordRequest;
					$firstTimeLogin = $result[0]->firstTimeLogin;
					$cvComplete = $result[0]->cvComplete;
					$fname = $result[0]->fname;
					$mname = $result[0]->mname;
					$lname = $result[0]->lname;
					$mobileNo = $result[0]->mobileNo;
					$address = $result[0]->address;
					$country = $result[0]->country;
					$PIN = $result[0]->PIN;
					$nationalID = $result[0]->nationalID;
					$physicallyDisabled = $result[0]->physicallyDisabled;
					$maritalStatus = $result[0]->maritalStatus;
					$currentLocation = $result[0]->currentLocation;

					//check if C.V is complete
					$this->validateCompetionOfCV($email,$cvComplete);
					
					$newdata = array(
						'username'=>$username,
				        'FirstName' => $fname,
				        'MiddleName' => $mname,
				        'LastName' => $lname,
				        'Email'=> $email,
				        'changePasswordRequest'=> $changePasswordRequest,
				        'firstTimeLogin'=> $firstTimeLogin,
				        'cvComplete'=> $cvComplete,
				        'mobileNo'=> $mobileNo,
				        'address'=> $address,
				        'country'=> $country,
				        'PIN'=> $PIN,
				        'nationalID'=> $nationalID,
				        'physicallyDisabled'=> $physicallyDisabled,
				        'maritalStatus'=> $maritalStatus,
				        'currentLocation'=> $currentLocation,
				        'logged_in' => TRUE
					);
					$this->session->set_userdata($newdata);	

					$response['message'] =  "Logged In";
					$response['status'] = 0;
			}else{
				$response['message'] = "Invalid Credentials. <br/> Register using your employee ID to login.";
				$response['status'] = 1;
			}
			$response = json_encode($response);
		} else {
			$response = json_encode(array('message' => 'Invalid account data provided', 'status' => 1));
		}		
		
		echo($response);
		
	}

	public function validateEmail(){
		$forgot_email = $_POST['forgot_email'];

		if (!filter_var($forgot_email, FILTER_VALIDATE_EMAIL)) {
		  $result = json_encode(array(0 => array('message' => 'Invalid email format',
		  				 'status' => 0)));
		}else {
			$curl = curl_init();
			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => sqlnterfaceURL,
			    CURLOPT_USERAGENT => 'ESSDP',
			    CURLOPT_POST => 1,
			    CURLOPT_POSTFIELDS => array(
			        'action' => 'VALIDATEEMAIL',
			       	'register_email'=> $forgot_email
			    )
			));
			$result = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);
		}
		echo $result;		
	}

	function validate_code()
	{
		$email = $_POST['email'];
		$code = $_POST['code'];

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $result = json_encode(array(0 => array('message' => 'Invalid email format',
		  				 'status' => 0)));
		}else {
			$curl = curl_init();
			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => sqlnterfaceURL,
			    CURLOPT_USERAGENT => 'ESSDP',
			    CURLOPT_POST => 1,
			    CURLOPT_POSTFIELDS => array(
			        'action' => 'confirmCode',
			       	'emailAddress'=> $forgot_email,
			       	'verificationCode'=> $code
			    )
			));
			$result = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);
		}
		echo $result;	
	}

	function passChangeCode()
	{
		return mt_rand();
	}

	function emailSendForgottenPassword($to,$message)
	{
		$FName = "KIPPRA";
		$LName = "ESS";
		//person sending email

		//Subject of the Email
		$subject = "PASSWORD CHANGE REQUEST!";

		// $From = "kipprahr@kippra.or.ke";
		$From = "kippraess@gmail.com";

		$resp = $this->phpMailerSendMail($FName, $LName, $subject, $message, $From, $to);
	}

	function email_template($data)
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
								<h3>Hi, '.$data['name'].'</h3>
								'.$data['messgae'].'				
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
