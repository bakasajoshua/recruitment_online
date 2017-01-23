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
		$vacancydetails = $this->getSpecificVacancy($adID);
		$vacancyCompetencyDetails = $this->getVacancyCompetencyDetails($adID);
		$vacancySkillsDescription = $this->getVacancySkillsDescription($adID);
		$vacancyPerformanceDetails = $this->getVacancyPerformanceDetails($adID);
		$vacancyQualificationDetails = $this->getVacancyQualificationDetails($adID);		

		$data['vacancyDetails'] = $vacancydetails;
		$data['vacancyCompetencyDetails'] = $vacancyCompetencyDetails;
		$data['vacancySkillsDescription'] = $vacancySkillsDescription;
		$data['vacancyPerformanceDetails'] = $vacancyPerformanceDetails;
		$data['vacancyQualificationDetails'] = $vacancyQualificationDetails;

		$data['content_view'] = 'info/ViewVacancy_v';
		$this->load->view('template/template_v.php',$data);
	}
	
	public function makeJobApplication(){	
		$adID = $_POST['jobADID'];
		$emailAddress = $this->session->userdata('Email');
		$dateOfApplication = date("Ymd");//use this format to insert into sql server, display format to user is data(dmY)

		$checkReapplication = $this->checkForReapplication($emailAddress,$adID);
		
		if($checkReapplication == 1){//user has already applied for this job position
			echo "You have already applied for this position";
		}else if($checkReapplication == 0){//the user has not yet applied 
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

			echo($makeJobApplicationResponse);
		}else{//an error ocurred duirng this process
			echo "An error occured while making your application. Please try again later.";
		}
	}

	public function checkForReapplication($emailAddress,$adID){	
		$adID = $_POST['jobADID'];
		$emailAddress = $this->session->userdata('Email');
		$dateOfApplication = date("Ymd");//use this format to insert into sql server, display format to user is data(dmY)

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'CHECKFORREAPPLICATION',
		        'adID' => $adID,
		        'emailAddress'=>$emailAddress
		    )
		));		
		$checkForReapplicationResponse = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);

		return $checkForReapplicationResponse;
	}

	public function getVacancySkillsDescription($adID){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'getVacancySkillsDescription',
		        'adID' => $adID
		    )
		));
		$vacancySkillsDescription = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		return $vacancySkillsDescription;
	}

	public function getVacancyQualificationDetails($adID){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'getVacancyQualificationDetails',
		        'adID' => $adID
		    )
		));
		$vacancyQualificationDetails = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		return $vacancyQualificationDetails;
	}

	public function getVacancyPerformanceDetails($adID){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'getVacancyPerformanceDetails',
		        'adID' => $adID
		    )
		));
		$vacancyPerformanceDetails = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		return $vacancyPerformanceDetails;
	}

	public function getVacancyCompetencyDetails($adID){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'getVacancyCompetencyDetails',
		        'adID' => $adID
		    )
		));
		$vacancyCompetencyDetails = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		return $vacancyCompetencyDetails;
	}
}
