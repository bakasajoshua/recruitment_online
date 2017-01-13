<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class ViewCV extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->isLoggedIN();
		$data['content_view'] = 'home/viewCV_v';

		$data['myCVPersonalDetails'] = $this->getPersonalDetails($this->session->userdata('Email'));
		$data['getQualificationDetails'] = $this->getQualificationDetails($this->session->userdata('Email'));
		$data['getemploymentHistoryDetails'] = $this->getemploymentHistoryDetails($this->session->userdata('Email'));
		$data['getRefereeDetails'] = $this->getRefereeDetails($this->session->userdata('Email'));
		
		$this->load->view('template/template_v.php',$data);
		// $this->load->view('home/viewCV_v');
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
		$getQualificationDetailsResponse = curl_exec($curl);

		// Close request to clear up some resources
		curl_close($curl);
		// echo $getQualificationDetailsResponse;	
		return $getQualificationDetailsResponse;
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
}
