<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Faqs extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		// echo "<pre>";print_r($getEmploymentHistoryDetailsDecoded);die();
		$data['content_view'] = 'info/faqs_v';
		$this->load->view('template/template_v.php',$data);

		// $curl = curl_init();
		// curl_setopt_array($curl, array(
		//     CURLOPT_RETURNTRANSFER => 1,
		//     CURLOPT_URL => sqlnterfaceURL,
		//     CURLOPT_USERAGENT => 'ESSDP',
		//     CURLOPT_POST => 1,
		//     CURLOPT_POSTFIELDS => array(
		//         'action' => 'confirm_referee',
		//         "email"=>$this->session->userdata('Email'),
		//         "refemail"=>'joshua.bakasa@dataposit.co.ke'
		//     )
		// ));
		// $result = curl_exec($curl);
		// // Close request to clear up some resources
		// curl_close($curl);
		// echo "<pre>";print_r($result);die();

		
	}

	function test_function()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'REMOVECV',
		        "email"=>'joshua.bakasa@dataposit.co.ke'
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		echo "<pre>";print_r($result);die();
	}
}
