<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2011 Wiredesignz
 * @version 	5.4
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller 
{
	public $autoload = array();
	
	public function __construct() 
	{
		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");
		Modules::$registry[strtolower($class)] = $this;	
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->initialize($this);	
		
		/* autoload module items */
		$this->load->_autoloader($this->autoload);
	}
	
	public function __get($class) {
		return CI::$APP->$class;
	}

	//check if user is logged in
	public function isLoggedIN(){
		$logInStatus = $this->session->userdata('logged_in');
		if($logInStatus == 1){//1 for true
			//prevent from seeing login page
		}else{
			//force to view login page
			$loginUrl = base_url('Login?m=1');
			header('Location: '.$loginUrl);
		}
	}	
	//check if user is logged in

	//gets all sdvertised vacancies
	public function getVacancies(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'GETVACANCIES'
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		// print_r($result);die;
		return $result;
	}

	public function getApplications($email){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => sqlnterfaceURL,
			CURLOPT_USERAGENT => 'ESSDP',
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => array(
				'action' => 'GETAPPLICATIONS',
				'emailAddress' => $email
			)
		));
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}

	public function getSpecificVacancy($adID){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'GETSPECIFICVACANCY',
		        'adID' => $adID
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		return $result;
	}

	public function getPersonalDetails($userEmail){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'GETPERSONALDETAILS',
		        'emailAddress'=>$userEmail

		    )
		));		
		$getPersonalDetailsResponse = curl_exec($curl);

		// Close request to clear up some resources
		curl_close($curl);
		return $getPersonalDetailsResponse;
		// echo $getPersonalDetailsResponse;
	}

	public function getQualificationDetails($userEmail){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'GETQUALIFICATIONDETAILS',
		        'emailAddress'=>$userEmail

		    )
		));		
		$getQualificationDetailsResponse = curl_exec($curl);

		// Close request to clear up some resources
		curl_close($curl);
		return $getQualificationDetailsResponse;
		// echo $getQualificationDetailsResponse;
	}

	public function getRefereeDetails($userEmail){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'GETREFEREEDETAILS',
		        'emailAddress'=>$userEmail

		    )
		));		
		$getRefereeeDetailsResponse = curl_exec($curl);

		// Close request to clear up some resources
		curl_close($curl);
		// echo $getQualificationDetailsResponse;	
		return $getRefereeeDetailsResponse;
	}

	public function getemploymentHistoryDetails($userEmail){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'GETEMPLOYMENTHISTORY',
		        'emailAddress'=>$userEmail

		    )
		));		
		$getemploymentHistoryDetailsResponse = curl_exec($curl);

		// Close request to clear up some resources
		curl_close($curl);
		// echo $getemploymentHistoryDetailsResponse;
		return $getemploymentHistoryDetailsResponse;;
	}

	public function validateCompetionOfCV($email,$cvComplete){
		//check if C.V is complete
		if($cvComplete == 1){//the C.V has not been uploaded
			//check if the user has completed the login since the last login attempt
			//get all C.V details
			
			$myCVPersonalDetails = $this->getPersonalDetails($email);
			$getQualificationDetails = $this->getQualificationDetails($email);
			$getemploymentHistoryDetails = $this->getemploymentHistoryDetails($email);
			$getRefereeDetails = $this->getRefereeDetails($email);
			$getUserDocDetails = $this->getUserDocDetails($email);

			$sizeOfmyCVPersonalDetails = sizeof(json_decode($myCVPersonalDetails));
			$sizeOfgetQualificationDetails = sizeof(json_decode($getQualificationDetails));
			$sizeOfgetemploymentHistoryDetails = sizeof(json_decode($getemploymentHistoryDetails));
			$sizeofgetRefereeDetails = sizeof(json_decode($getRefereeDetails));
			$sizeOfgetUserDocDetails = sizeof(json_decode($getUserDocDetails));

			if($sizeOfmyCVPersonalDetails >= 1 && $sizeOfgetQualificationDetails >= 1 && $sizeOfgetemploymentHistoryDetails >= 1 && $sizeofgetRefereeDetails >= 1 && $sizeOfgetUserDocDetails >= 1) {
				//the user has provided all the above details therfore you update the DB to reflect the completed C.V
				$curl = curl_init();
				curl_setopt_array($curl, array(
				    CURLOPT_RETURNTRANSFER => 1,
				    CURLOPT_URL => sqlnterfaceURL,
				    CURLOPT_USERAGENT => 'ESSDP',
				    CURLOPT_POST => 1,
				    CURLOPT_POSTFIELDS => array(
				        'action' => 'UPDATECOMPLETECV',
				        'emailAddress' => $email						       	
				    )
				));
				$result = curl_exec($curl);
				// Close request to clear up some resources
				curl_close($curl);
				if($result == "Updated"){//the C.V complete status is set to Completed, allow user to login
					$this->session->set_userdata('cvComplete', 0);
					$response['status'] = 0;
					$response['message'] = "CV is complete";					
					return json_encode($response);
				}else{//an error occured while updateing the complete CV status, allow user to login but warn them about not been able to apply for positions
					$response['status'] = 1;
					$response['message'] = "CV is complete, but you might not be able to apply";
				}
				return json_encode($response);
			}else{
				//do nothing because user needs to provide these details
				$response['status'] = 2;
				$response['message'] = "Complete your CV to apply for this postion.";
				return json_encode($response);
			}

		}else {//check if C.V is complete
			$response['status'] = 0;
			$response['message'] = "CV has been completed";
			return json_encode($response);
		}
		
	}

	public function getUserDocDetails($userEmail){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'GETUSERDOCS',
		        'email'=>$userEmail

		    )
		));		
		$getUserDocDetailsResponse = curl_exec($curl);

		// Close request to clear up some resources
		curl_close($curl);
		// echo $getemploymentHistoryDetailsResponse;
		return $getUserDocDetailsResponse;
	}

	//GMAIL for local developement

	//send Mail
		public function phpMailerSendMail($FName, $LName, $subject, $Message, $From, $to){
		//SMTP needs accurate times, and the PHP time zone MUST be set
		//This should be done in your php.ini, but this is how to do it if you don't have access to that
		date_default_timezone_set('Etc/UTC');

		//Create a new PHPMailer instance
		$mail = new PHPMailer;

		//Tell PHPMailer to use SMTP
		$mail->isSMTP();

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;

		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';

		//Set the hostname of the mail server

		// $mail->Host = 'mail.kippra.or.ke';
		// use
		$mail->Host = 'smtp.gmail.com';
		// if your network does not support SMTP over IPv6

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		// $mail->Port = 25;
		$mail->Port = 465;

		//Set the encryption system to use - ssl (deprecated) or tls
		// $mail->SMTPSecure = 'tsl';
		$mail->SMTPSecure = 'ssl';

		//Whether to use SMTP authentication
		// $mail->SMTPAuth = false;
		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		// $mail->Username = "kipprahr@kippra.or.ke";
		$mail->Username = "kippraess@gmail.com";

		//Password to use for SMTP authentication
		// $mail->Password = "Treasury123";
		$mail->Password = "abc123**";

		//Set who the message is to be sent from
		$mail->setFrom($From, $FName." ".$LName);

		//Set an alternative reply-to address
		$mail->addReplyTo($From, $FName." ".$LName);

		//Set who the message is to be sent to
		if( is_array($to) == 1){
			$approver = $to['approver'];
			$applier = $to['applier'];
			$mail->addAddress($applier, 'NAV ESS Support');
			$mail->AddCC($approver, 'Line Manager');
		}else{
			$mail->addAddress($to, 'NAV ESS Support');
		}
		
		// if(strcasecmp($subject, "Password Reset") == 0 || strcasecmp($subject, "Successfully Registered") == 0 || strcasecmp($subject, "Employee Requisitions") == 0 ||  strcasecmp($subject, "Pending Leave Approval") == 0 || strcasecmp($subject, "Leaev Approved") == 0 ){

		// }else{
		// 	//$mail->AddCC('navsupport@dataposit.co.ke', 'NAV SUPPORT');
		// }

		//Set the subject line
		$mail->Subject = $subject;

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		// file_get_contents('contents.html'), dirname(__FILE__)
		$mail->msgHTML($Message);

		//Replace the plain text body with one created manually
		// $mail->AltBody = 'This is a plain-text message body';

		//Attach an image file
		//$mail->addAttachment('images/phpmailer_mini.png');

		//send the message, check for errors
		if (!$mail->send()) {
		    // echo "Mailer Error: " . $mail->ErrorInfo;
		    // $resp['message'] = "Mailer Error: " . $mail->ErrorInfo;
		    $resp['message'] = "Error occured whille sending.";
		    $resp['status'] = 1;	
		} else {
		    $resp['message'] = "Mail sent";
		    $resp['status'] = 0;	
		}

		return json_encode($resp);
	}

	function checkLogin()
	{

		if($this->session->userdata('logged_in')){
			redirect(base_url().'info');
		}

	}

	//Logout
	public function logoutController(){
		$this->session->sess_destroy();
		$loginUrl = base_url('Login?m=2');
		header('Location: '.$loginUrl);
	}
	//Logout
}