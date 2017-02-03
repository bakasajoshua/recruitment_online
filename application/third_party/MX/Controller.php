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
					$response['message'] = "CV is complete, but y1ou might not be able to apply";
				}
				return json_encode($response);
			}else{
				//do nothing because user needs to provide these details
				$response['status'] = 2;
				$response['message'] = "Complete your CV to apply for this postion.";
				return json_encode($response);
			}
		}
		//check if C.V is complete
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

	//Logout
	public function logoutController(){
		$this->session->sess_destroy();
		$loginUrl = base_url('Login?m=2');
		header('Location: '.$loginUrl);
	}
	//Logout
}