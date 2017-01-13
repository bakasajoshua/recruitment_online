<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class ViewVacancy extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		
	}

	public function vacancydetails($adID){		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'VIEWVACANCYDETAILS',
		        'adID' => $adID
		    )
		));
		$vacancyAdditionalInfo = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);

		$vacancydetails = $this->getSpecificVacancy($adID);
		
		
		$data['vacancyDetails'] = $vacancydetails;
		$data['vacancyAdditionalInfo'] = $vacancyAdditionalInfo;

		$data['content_view'] = 'info/ViewVacancy_v';
		$this->load->view('template/template_v.php',$data);
	}
	
	public function makeJobApplication(){		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'MAKEJOBAPPLICATION',
		        'adID' => $adID,
		        'emailAddress'=>$emailAddress,
		        'dateOfApplication'=>$dateOfApplication

		    )
		));		
		$makeJobApplicationResponse = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);

		print_r($makeJobApplicationResponse);
	}
}
