<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';
require_once('phpmailer/class.phpmailer.php');
define('GUSER', 'kippraregister@gmail.com'); // Gmail username
define('GPWD', 'K!pprareg@0123'); // Gmail password

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

	function smtpmailer($from='baksajoshua09@gmail.com', $from_name='TESTING', $body='This is the body of the email!') { 
		global $error;
		$mail = new PHPMailer();  // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465; 
		$mail->Username = GUSER;  
		$mail->Password = GPWD;           
		$mail->From = GUSER;
		$mail->FromName = $from_name;
		
		$mail->AddReplyTo(GUSER, $from_name);
		$mail->Subject = 'WELCOME TO KIPPRA';
		$mail->Body = $body;
		// echo "<pre>";print_r($mail);die();
		// $mail->AddAddress('jbatuka@usaid.gov');
		// $mail->AddAddress('jhungu@clintonhealthaccess.org');
		// $mail->AddAddress('aaron.mbowa@dataposit.co.ke');
		// $mail->AddAddress('jlusike@clintonhealthaccess.org');
		// $mail->AddAddress('tngugi@clintonhealthaccess.org');
		$mail->AddAddress('joshua.bakasa@strathmore.edu');
		if(!$mail->Send()) {
			$error = 'Mail error: '.$mail->ErrorInfo; 
			return false;
		} else {
			$error = 'Message sent!';
			return true;
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