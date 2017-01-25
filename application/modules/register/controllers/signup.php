<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Signup extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['content_view'] = 'register/signup_v';
		$this->load->view('template/template_v.php',$data);
	}

	public function saveuser(){		
		$register_name = $_POST['register_name'];
		$register_email = $_POST['register_email'];
		$register_password = $_POST['register_password'];
		$register_password = sha1($register_password);

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'REGISTERUSER',
		        'register_name' => $register_name,
		       	'register_email'=> $register_email,
		       	'register_password'=>$register_password
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);

		echo($result);
	}


	public function validateEmail(){
		$register_email = $_POST['register_email'];

		if (!filter_var($register_email, FILTER_VALIDATE_EMAIL)) {
		  $result = json_encode(array(0 => array('message' => 'Invalid email format',
		  				 'status' => 1)));
		}else {
			$curl = curl_init();
			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => sqlnterfaceURL,
			    CURLOPT_USERAGENT => 'ESSDP',
			    CURLOPT_POST => 1,
			    CURLOPT_POSTFIELDS => array(
			        'action' => 'VALIDATEEMAIL',
			       	'register_email'=> $register_email
			    )
			));
			$result = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);
		}
		echo $result;		
	}
}
