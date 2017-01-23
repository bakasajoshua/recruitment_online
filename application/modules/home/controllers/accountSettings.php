<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class AccountSettings extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->isLoggedIN();
		$data['content_view'] = 'home/accountSettings_v';
		$this->load->view('template/template_v.php',$data);
	}

	public function updateAccountDetails(){
		$email = $_POST["email"];
		$currentPassword = $_POST['currentPassword'];
		$newPass = $_POST["newPass"];
		$username = $_POST["username"];
		$newPass = sha1($newPass);
		$currentPassword = sha1($currentPassword);

		$currentLoginDetailsstatus = $this->validateCurrentLoginDetails($email, $currentPassword);
		// print_r($currentLoginDetailsstatus);die;
		$currentLoginDetailsstatus = json_decode($currentLoginDetailsstatus);
		$status = $currentLoginDetailsstatus->status;
		$message = $currentLoginDetailsstatus->message;

		if($status == 0){//the login credentials are ok			
			$curl = curl_init();
			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => sqlnterfaceURL,
			    CURLOPT_USERAGENT => 'ESSDP',
			    CURLOPT_POST => 1,
			    CURLOPT_POSTFIELDS => array(
			        'action' => 'UPDATEACCOUNTDETAILS',
			        'email' => $email,
			       	'newPass'=> $newPass,
			       	'username'=>$username
			    )
			));
			$result = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);

			if($result == "Updated"){//the pasword update was successful
				$resp['message'] = "The password change was successful";
				$resp['status'] = 0;
			}else{
				$resp['message'] = "An error occrred while updating your credentials. Kindly try again later.";
				$resp['status'] = 0;
			}
			//echo($result);
		}else if($status == 1){//the login credentials are wrong
			$resp['status'] = 1;
			$resp['message'] = "The current password provided is wrong.";
		}else{}

		$resp = json_encode($resp);
		echo $resp;
	}

	public function validateCurrentLoginDetails($emailAddress, $password){
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
		
		
		if(isset($result[0]->fname)){//the credentials provided are correct
			$resp['message'] = "The current password provided is correct";
			$resp['status'] = 0;
		}else{//the credentials provided are not correct
			$resp['message'] = "The current password provided is wrong";
			$resp['status'] = 1;
		}
		return json_encode($resp);
	}
}
