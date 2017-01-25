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
			// echo "Modulus of ".$qualificationArrayCounter." % 4 is ".$X." <br/>";
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

	//uploads the application letter to the server
	public function saveDocuments(){
		//https://www.sitepoint.com/file-uploads-with-php/		
		$fileName = $_FILES["documentsApplicationLetter"]["name"];// stores the original filename from the client
		$fileType = $_FILES["documentsApplicationLetter"]["type"];// stores the file’s mime-type
		$fileSize = $_FILES["documentsApplicationLetter"]["size"];// stores the file’s size (in bytes)
		$tmpName = $_FILES["documentsApplicationLetter"]["tmp_name"]; //tempName
		$fileError = $_FILES["documentsApplicationLetter"]["error"];
		$uploadLocation = "C:\\xampp\\htdocs\\recruit\\assets\\uploads";//base_url('assets/uploads');
		$URLToFileLocation = '169.239.252.31:8080/assets/uploads';
		$fileName = preg_replace("/[^A-Z0-9._-]/i", "_", $fileName);
		$fileNameArray = explode(".", $fileName);// ensure a safe filename
		// if (!empty($_FILES["documentsApplicationLetter"])) {

		// 	$fileType = $fileNameArray[1];
			// print_r($fileType."File type");die;
			// $allowed = array("docx", "doc", "pdf");
			// if (!in_array($fileType, $allowed)) {
			// 	$response['message'] = "Invalid File Type";
			// 	$response['status'] = 1;
			// }else{
	    		$randomNum = rand(999,999999);
	    		$date = date('dmY');
	    		$newFileName = $fileNameArray[0].$randomNum."APPLetter_".$date.".".$fileNameArray[1];
	    		$URLToFileLocation = $URLToFileLocation."/".$newFileName;
			    // preserve file from temporary directory
			    $success = move_uploaded_file($tmpName,$uploadLocation ."/". $newFileName);
			    if (!$success) { 
			    	$response['message'] = "Unable to save file.";
					$response['status'] = 1;
			        exit;
			    }else{
			    	$response['message'] = "Successfully Uploaded the application letter.";
					$response['status'] = 0;
					//save the url to the DB
					$userEmail = $this->session->userdata('Email');
					$this->session->set_userdata('pathTOApplicationLetter', $URLToFileLocation);
					// $return = $this->saveImagePathsToDB($URLToFileLocation, $userEmail);
			    }
			// }
		// }else{
		// 	$response['message'] = "Please select a file.";
		// 	$response['status'] = 1;
		// }

		echo json_encode($response);
		
		// echo $uploadLocation;die;

	 //    foreach  ($_FILES['file']['name'] as $key => $name) {
	 //    	move_uploaded_file($_FILES['file']['tmp_name'][$key],$uploadLocation."");
	 //  	}
	}
	//uploads the application letter to the server

	//uploads teh CV to the server
	public function saveCV(){
		$fileName = $_FILES["documentsCV"]["name"];// stores the original filename from the client
		$fileType = $_FILES["documentsCV"]["type"];// stores the file’s mime-type
		$fileSize = $_FILES["documentsCV"]["size"];// stores the file’s size (in bytes)
		$tmpName = $_FILES["documentsCV"]["tmp_name"]; //tempName
		$fileError = $_FILES["documentsCV"]["error"];
		$uploadLocation = "C:\\xampp\\htdocs\\recruit\\assets\\uploads";//base_url('assets/uploads');
		$URLToFileLocation = '169.239.252.31:8080/assets/uploads';

		$fileName = preg_replace("/[^A-Z0-9._-]/i", "_", $fileName);
		$fileNameArray = explode(".", $fileName);// ensure a safe filename
		// if (!empty($_FILES["documentsCV"])) {

			// $fileType = $fileNameArray[1];
			// print_r($fileType."File type");die;
			// $allowed = array("docx", "doc", "pdf");
			// if (!in_array($fileType, $allowed)) {
			// 	$response['message'] = "Invalid File Type";
			// 	$response['status'] = 1;
			// }else{
	    		$randomNum = rand(999,999999);
	    		$date = date('dmY');
	    		$newFileName = $fileNameArray[0].$randomNum."CV_".$date.".".$fileNameArray[1];
	    		$URLToFileLocation = $URLToFileLocation."/".$newFileName;
			    // preserve file from temporary directory
			    $success = move_uploaded_file($tmpName,$uploadLocation ."/". $newFileName);
			    if (!$success) { 
			    	$response['message'] = "Unable to save file.";
					$response['status'] = 1;
			        exit;
			    }else{
			    	$response['message'] = "Successfully Uploaded the CV.";
					$response['status'] = 0;
					//save the url to the DB
					$userEmail = $this->session->userdata('Email');
					$this->session->set_userdata('URLToCv', $URLToFileLocation);
					//$return = $this->saveImagePathsToDB($URLToFileLocation, $userEmail);
			    }
			// }
		// }else{
		// 	$response['message'] = "Please select a file.";
		// 	$response['status'] = 1;
		// }

		echo json_encode($response);
	}
	//uploads teh CV to the server

	//after uploading the Document to the server save the paths to the DB
	public function saveFilePaths(){
		$emailAddress = $this->session->userdata('Email');
		$pathTOCv = $this->session->userdata('URLToCv');
		$pathTOApplicationLetter = $this->session->userdata('pathTOApplicationLetter');

		$pathTOApplicationLetter = json_encode($pathTOApplicationLetter);
		$pathTOCv = json_encode($pathTOCv);

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'SAVEFILEPATHS',        
		        'emailAddress'=>$emailAddress,
		        'pathTOCv' => $pathTOCv,
		       	'pathTOApplicationLetter'=> $pathTOApplicationLetter
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		$this->session->unset_userdata('URLToCv');
		$this->session->unset_userdata('pathTOApplicationLetter');


		if($result === "Inserted"){//successfully uploaded Application and CV
			// echo "worked ".$result;
			$resp['status'] = 0;
			$resp['message'] = "You successfully uploaded your documents.";
		}else{
			// echo "didn't works ".$result;
			$resp['status'] = 1;
			$resp['message'] = "An error occurred while saving your documents. Kindly try again later";
		}
		echo json_encode($resp);
	}
	//after uploading the Document to the server save the paths to the DB

	public function getPersonalDetailsFromDB(){
		$userEmail = $this->session->userdata('Email');
		$getPersonalDetails = $this->getPersonalDetails($userEmail);
		$getPersonalDetailsDecoded = json_decode($getPersonalDetails);
		if(sizeof($getPersonalDetailsDecoded) <= 0){
			//no personal details have been save so far
			$response['status'] = 1;
			$response['message'] = "You have not provided any personal details";
		}else{
			//some personal details have been saved
			$response['status'] = 0;
			$response['data'] = $getPersonalDetailsDecoded;
			$response['message'] = "You have successfully retreived your personal details";
		}
		echo json_encode($response);

	}

	public function getEmploymentHistoryDetailsFromDB(){
		$userEmail = $this->session->userdata('Email');
		$getEmploymentHistoryDetails = $this->getemploymentHistoryDetails($userEmail);	
		$getEmploymentHistoryDetailsDecoded = json_decode($getEmploymentHistoryDetails);
		if(sizeof($getEmploymentHistoryDetailsDecoded) <= 0){
			//no employment history details havev been saved so far
			$response['status'] = 1;
			$response['message'] = "You have not provided any employment history details";
		}else{
			//some employment history has been saved therefore list it
			$response['status'] = 0;
			$response['data'] = $getEmploymentHistoryDetailsDecoded;
			$response['message'] = "You have successfully retreived your employment history details";
		}
		echo json_encode($response);
	}

	public function getQualificationDetailsFromDB(){
		$userEmail = $this->session->userdata('Email');
		$getQualificationDetails = $this->getQualificationDetails($userEmail);	
		$getQualificationDetailsDecoded = json_decode($getQualificationDetails);
		if(sizeof($getQualificationDetailsDecoded) <= 0){
			//no qualification details havev been saved so far
			$response['status'] = 1;
			$response['message'] = "You have not provided any qualification details";
		}else{//qualification details havev been saved so far
			$response['status'] = 0;
			$response['data'] = $getQualificationDetailsDecoded;
			$response['message'] = "You have successfully retreived your qualification details";
		}
		echo json_encode($response);
	}
	

	public function getRefereeDetailsFromDB(){
		$userEmail = $this->session->userdata('Email');
		$getRefereeDetails = $this->getRefereeDetails($userEmail);	
		$getRefereeDetailsDecoded = json_decode($getRefereeDetails);

		if(sizeof($getRefereeDetailsDecoded) <= 0){//no referees have been save so far
			//do nothing
			$response['status'] = 2;
			$response['message'] = "You have not provided any referees so far";
		}else{//some referee details had been saved
			$response['status'] = 0;
			$response['data'] = $getRefereeDetailsDecoded;
			$response['message'] = "You have successfully retreived your referee details";
		}
		echo json_encode($response);
	}

	public function getUserDocuments(){
		$userEmail = $this->session->userdata('Email');
		$getUserDocetails = $this->getUserDocDetails($userEmail);	
		$getUserDocetailsDecoded = json_decode($getUserDocetails);

		if(sizeof($getUserDocetailsDecoded) <= 0){//no referees have been save so far
			//do nothing
			$response['status'] = 2;
			$response['message'] = "You have not provided any documents so far";
		}else{//some referee details had been saved
			$response['status'] = 0;
			$response['data'] = $getUserDocetailsDecoded;
			$response['message'] = "You have successfully retreived your document details";
		}
		echo json_encode($response);
	}
}
