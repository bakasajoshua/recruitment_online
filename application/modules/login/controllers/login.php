<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Login extends MX_Controller {
	
	function __construct() {
		parent::__construct();

	}

	public function index() {
		$this->checkLogin();
		$data['content_view'] = 'login/login_v';
		$this->load->view('template/template_v.php',$data);
	}

	public function loginUser(){
		$emailAddress = $_POST['loginDetails'][0]['value'];
		$password = $_POST['loginDetails'][1]['value'];
		$password = sha1($password);

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
		// echo $result;
		curl_close($curl);
		$result = json_decode($result);
		// echo "<pre>";print_r($result);die();
		
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
				// echo json_encode($cvComplete);die();
				if ($cvComplete == 1 || $cvComplete == "1") {
					$response['message'] =  "Logged In";
					$response['status'] = 2;
				} else {
					$response['message'] =  "Logged In";
					$response['status'] = 0;
				}
				
		}else{
			$response['message'] = "Invalid Credentials. <br/> Register using your employee ID to login.";
			$response['status'] = 1;
		}
		$response = json_encode($response);
		echo($response);
	}

	public function logout(){
		$this->logoutController();
	}
}

