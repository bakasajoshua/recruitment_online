<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class UploadResume extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->isLoggedIN();
		$data['content_view'] = 'home/uploadResume_v';
		$this->load->view('template/template_v.php',$data);
	}

	public function savePersonalDetails(){
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$mobileNo = $_POST['mobileNo'];
		$address =$_POST['address'];
		$country = $_POST['country'];
		$pin = $_POST['pin'];
		$passportNo = $_POST['passportNo'];
		$disabledStatus = $_POST['disabledStatus'];
		$maritalStatus = $_POST['maritalStatus'];
		$currentLocation = $_POST['currentLocation'];
		$nationalIDNO = $_POST['nationalIDNO'];
					
		$email = $this->session->userdata('Email');

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'SAVEPERSONALDETAILS',
		        "email"=>$email,
		        "fname"=>$fname,
				"mname"=>$mname,
				"lname"=>$lname,
				"mobileNo"=>$mobileNo,
				"address"=>$address,
				"country"=>$country,
				"pin"=>$pin,
				"passportNo"=>$passportNo,
				"disabledStatus"=>$disabledStatus,
				"maritalStatus"=>$maritalStatus,
				"currentLocation"=>$currentLocation,
				"nationalIDNO"=>$nationalIDNO
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		echo $result;
	}

	public function saveQualificationDetails(){
		$qualificationValues = $_POST['qualificationsFormValues'];
		// print_r($qualificationValues);die;
		$qualificationValuesContainer = array();
		$specificqualificationValuesContainer = array();
		$arrayCounter = 0;
		$qualificationArrayCounter = 0;

		for($i = 0; $i <sizeof($qualificationValues); $i++){

			$inputFieldValue =  $qualificationValues[$i]['value'];//gets per input field therefore group  them in fours

			$X = $qualificationArrayCounter%4;
			echo "Modulus of ".$qualificationArrayCounter." % 4 is ".$X." <br/>";
			if($X == 0){
				$specificqualificationValuesContainer['institution'] = $inputFieldValue;
			}else if($X == 1){
				$specificqualificationValuesContainer['certificationType'] = $inputFieldValue;
			}else if($X == 2){
				$specificqualificationValuesContainer['description'] = $inputFieldValue;
			}else if($X == 3){
				$specificqualificationValuesContainer['yearsCompleted'] = $inputFieldValue;
			}
			$qualificationArrayCounter++;

			$modulus = $arrayCounter % 3;
			if($modulus == 0 && $arrayCounter != 0){
				array_push($qualificationValuesContainer,$specificqualificationValuesContainer);
				$arrayCounter = -1;
			}
			//groups of the qualifications in 4's
			$arrayCounter++;
		}

		$qualificationValuesContainer = json_encode($qualificationValuesContainer);
		$email = $this->session->userdata('Email');
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'SAVEQUALIFICATIONS',        
		        'qualifications' => $qualificationValuesContainer,
		       	'email'=> $email
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);

		echo $result;
	}

	public function saveEmploymentHistoryDetails(){
		$employmentHistoryVAlues = $_POST['employmentHistoryFormValues'];

		$employmentHistoryVAluesContainer = array();
		$specificEmploymentHistoryVAluesContainer = array();
		$arrayCounter = 0;
		$employmentHistoryArrayCounter = 0;

		for($i = 0; $i <sizeof($employmentHistoryVAlues); $i++){

			$inputFieldValue =  $employmentHistoryVAlues[$i]['value'];//gets per input field therefore group  them in fours

			$X = $employmentHistoryArrayCounter%4;//get the modulus of the number on input fields
			//echo "Modulus of ".$employmentHistoryArrayCounter." % 4 is ".$X." <br/>";
			if($X == 0){
				$specificEmploymentHistoryVAluesContainer['institution'] = $inputFieldValue;//first input field
			}else if($X == 1){
				$specificEmploymentHistoryVAluesContainer['position'] = $inputFieldValue;//second input field
			}else if($X == 2){
				$specificEmploymentHistoryVAluesContainer['responsibilities'] = $inputFieldValue;//third input field
			}else if($X == 3){
				$specificEmploymentHistoryVAluesContainer['yearsCompleted'] = $inputFieldValue;//fourth input field
			}
			$employmentHistoryArrayCounter++;

			$modulus = $arrayCounter % 3;
			if($modulus == 0 && $arrayCounter != 0){
				array_push($employmentHistoryVAluesContainer,$specificEmploymentHistoryVAluesContainer);
				$arrayCounter = -1;
			}
			//groups of the qualifications in 4's
			$arrayCounter++;
		}
		$employmentHistoryVAluesContainer = json_encode($employmentHistoryVAluesContainer);
		$email = $this->session->userdata('Email');
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'SAVEEMPLOYMENTHISTORY',        
		        'employmentHistory' => $employmentHistoryVAluesContainer,
		       	'email'=> $email
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);

		echo $result;
	}

	public function saveRefereeDetails(){
		$refereeValues = $_POST['refereeFormValues'];

		$refereeValuesContainer = array();
		$specificRefereeValuesContainer = array();
		$arrayCounter = 0;
		$refereeValuesArrayCounter = 0;

		for($i = 0; $i <sizeof($refereeValues); $i++){

			$inputFieldValue =  $refereeValues[$i]['value'];//gets per input field therefore group  them in fours

			$X = $refereeValuesArrayCounter%7;//get the modulus of the number on input fields
			//echo "Modulus of ".$employmentHistoryArrayCounter." % 4 is ".$X." <br/>";
			if($X == 0){
				$specificRefereeValuesContainer['refereeFname'] = $inputFieldValue;//first input field
			}else if($X == 1){
				$specificRefereeValuesContainer['refereeLname'] = $inputFieldValue;//second input field
			}else if($X == 2){
				$specificRefereeValuesContainer['refereeDesignation'] = $inputFieldValue;//third input field
			}else if($X == 3){
				$specificRefereeValuesContainer['refereeOrg'] = $inputFieldValue;//fourth input field
			}else if($X == 4){
				$specificRefereeValuesContainer['refereePhone'] = $inputFieldValue;//fifth input field
			}else if($X == 5){
				$specificRefereeValuesContainer['refereeEmail'] = $inputFieldValue;//sixth input field
			}else if($X == 6){
				$specificRefereeValuesContainer['refereeWebsite'] = $inputFieldValue;//sixth input field
			}
			$refereeValuesArrayCounter++;

			$modulus = $arrayCounter % 6;//modulus less 1 the number of input fields
			if($modulus == 0 && $arrayCounter != 0){
				array_push($refereeValuesContainer,$specificRefereeValuesContainer);
				$arrayCounter = -1;
			}
			//groups of the qualifications in 4's
			$arrayCounter++;
		}
		$refereeValuesContainer = json_encode($refereeValuesContainer);
		$email = $this->session->userdata('Email');
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'SAVEREFEREES',        
		        'referee' => $refereeValuesContainer,
		       	'email'=> $email
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);

		echo $result;
	}

	
}
