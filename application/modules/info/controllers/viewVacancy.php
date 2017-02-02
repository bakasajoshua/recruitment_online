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
		$this->validateCompetionOfCV($this->session->userdata('Email'),$this->session->userdata('cvComplete'));//checks if C.V is complete to as to allow user to apply for position
		$data['content_view'] = 'info/ViewVacancy_v';
		$this->load->view('template/template_v.php',$data);
	}
	
	public function makeJobApplication(){	
		$adID = $_POST['jobADID'];
		$yearsOfExperienceNeeded = $_POST['yearsOfExperience'];
		$emailAddress = $this->session->userdata('Email');
		$cvComplete = "No";
		$dateOfApplication = date("Ymd");//use this format to insert into sql server, display format to user is data(dmY)
		$checkReapplication = $this->checkForReapplication($emailAddress,$adID);
		$checkReapplication = json_decode($checkReapplication);

		if(sizeof($checkReapplication) > 0){//the user has applied for this position 
			$cvComplete = $checkReapplication[0]->cvComplete;
			if($cvComplete == 1){//user has not completed CV
				$cvComplete = "No";
			}else if($cvComplete == 0){//user has completed CV
				$cvComplete = "Yes";
			}else{}
		}else{//if user has not applied check if CV is complete using different function.
			$curl = curl_init();
			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => sqlnterfaceURL,
			    CURLOPT_USERAGENT => 'ESSDP',
			    CURLOPT_POST => 1,
			    CURLOPT_POSTFIELDS => array(
			        'action' => 'checkForCompletedCV',
			        'emailAddress'=>$emailAddress
			    )
			));		
			$checkForCompletedCVResponse = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);
			$cvComplete = $checkForCompletedCVResponse;
			if($cvComplete == "No"){
				$cvComplete = 1;
			}
		}
		// echo "<pre>";print_r($emailAddress.'<__>'.$cvComplete);die();	
		$validateCompetionOfCVResponse = $this->validateCompetionOfCV($emailAddress,$cvComplete);
		$validateCompetionOfCVResponse = json_decode($validateCompetionOfCVResponse);
		// echo "<pre>";print_r($validateCompetionOfCVResponse);die();
		$status = $validateCompetionOfCVResponse->status;
		$msg = $validateCompetionOfCVResponse->message;

		if($status == 0){//CV is complete
			//check if user meets minimum qualifications for this position, based on working experince and academic qualifications
			$employmentHistory = $this->getemploymentHistoryDetails($emailAddress);
			$employmentHistory = json_decode($employmentHistory);
			$sizeofEmploymentHistory = sizeof($employmentHistory);
			$yearsOfExperiencePossessed = 0;
			for($i = 0; $i < $sizeofEmploymentHistory; $i++){			
				$yearsOfExperiencePossessed += $employmentHistory[$i]->yearsCompleted;//compute the number of working experience accoring to employment history
			}
			
			if($yearsOfExperienceNeeded <= $yearsOfExperiencePossessed){//meets yeras qualification
				//qualification possessed by the user
				$academicQualifications = $this->getQualificationDetails($emailAddress);
				$academicQualifications = json_decode($academicQualifications);
				$sizeofacademicQualifications = sizeof($academicQualifications);
				$userQualificationsArray = array();
				for($i = 0; $i < $sizeofacademicQualifications; $i++){
					//create an array of the qualification needed
					//compare this array with an array of qualifications possessed by the user
					$certificationType = $academicQualifications[$i]->certificationType;
					array_push($userQualificationsArray,$certificationType);
				}
				//qualification possessed by the user

				//qualifications expected by the position
				$expectedQualificationsArray = array();
				$vacancyQualificationDetails = $this->getVacancyQualificationDetails($adID);
				$vacancyQualificationDetails = json_decode($vacancyQualificationDetails);
				$sizeofvacancyQualificationDetails = sizeof($vacancyQualificationDetails);
				// sizeof($vacancyQualificationDetails)
				for($i = 0; $i < $sizeofvacancyQualificationDetails; $i++){
					$qualification = $vacancyQualificationDetails[$i]->description;
					array_push($expectedQualificationsArray,$qualification);
				}

				//qualifications expected by the position	

				$result = (array_intersect($expectedQualificationsArray, $userQualificationsArray));//if the resultant array is smaller than $expectedQualificationsArray, then the user falls short of the qualifications needed
				if(sizeof($result) < sizeof($expectedQualificationsArray)){//the user doesn't meet 
					$response['status'] = 1;
					$response['message'] = "You do not satisfy the minimum academic qualifications needed for this position.";
				}else{//user meets minimum academic qualifications for this position
					if($cvComplete === "No"){
						$response['status'] = 1;
						$response['message'] = "Kindly complete your C.V. to apply for this position. <a href='".base_url('home/uploadResume')."'>Click Here</a>  ";
					}else{
						if(sizeof($checkReapplication) == 1){//user has already applied for this job position
							$response['status'] = 1;
							$response['message'] = "You have already applied for this position.";
							echo json_encode($response);
						}else if(sizeof($checkReapplication) == 0){//the user has not yet applied 
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

							if($makeJobApplicationResponse === "Inserted"){
								$response['status'] = 0;
								$response['message'] = "You have successfully applied for the position advertised.";

								$response = json_encode($response);
								echo($response);
							}else{
								// echo "makeJobApplication error";
								$response['status'] = 1;
								$response['message'] = "An error occured while making your application. Please try again later.";

								$response = json_encode($response);
								echo($response);
							}
						}else{//an error ocurred duirng this process
							// echo "reapplication error";
							$response['status'] = 1;
							$response['message'] = "An error occured while making your application. Please try again later.";

							$response = json_encode($response);
							echo($response);
						}
					}				
				}
			}else{//doesn't meet years qualification
				$response['status'] = 1;
				$response['message'] = "You do not qualify for this position on account of insufficient experience";
				
				$response = json_encode($response);
				echo($response);
			}
		}else if($status == 1){//logout and login to complete CV

		}else if($status == 2){	
			$response['status'] = 1;
			$response['message'] = "Kindly complete your C.V. to apply for this position. <a href='".base_url('home/uploadResume')."'>Click Here</a>";

			$response = json_encode($response);
			echo($response);
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

	public function sendRegistrationemail($name,$email,$job_title,$job_description)
	{
		//person sending email
		$FName = "KIPPRA";
		$LName = "ESS";
		//person sending email

		//Subject of the Email
		$subject = "RECIEPT OF JOB APPLICATION";

		$Message = "<br/><p>Your job application for the position of ".$job_title." has been received.</p><br/>";
		$Message .= "<br /><strong><p>Job details</p></strong>";
		$Message .= "<br /><br />".$job_description."<br/>";

		// $From = "kipprahr@kippra.or.ke";
		$From = "kippraess@gmail.com";
		$to = $email;

		$resp = $this->phpMailerSendMail($FName, $LName, $subject, $Message, $From, $to);
		return $resp;
	}
}
?>
