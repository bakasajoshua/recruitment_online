<?php
//C# web service
	//$webServiceUrl = 'http://www.essdp.com:8080/Service.svc?wsdl';
	//$webServiceUrl = 'http://www.kippraservice.com:8095/Service.svc?wsdl';//dev on .31 
	$webServiceUrl = 'http://www.kipraservice.com:8084/Service.svc?wsdl';//Bakasa Local development
//C# web service
	
	if(isset($_POST['action'])){
		$action = $_POST['action'];

		if($action == "GETVACANCIES"){
			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getAllVacancies();
			} catch (SoapFault $e) {
				//$res = 3;
			    $res = "Error: {$e->faultstring}";
			}
			$resp = (array)$res;
			$response = $resp["getAllVacanciesResult"];
			echo $response;
		}else if($action == "GETAPPLICATIONS"){
			$emailAddress = $_POST['emailAddress'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getApplications(array("email" => $emailAddress));
			} catch (SoapFault $e){
				$res = "Error: {$e->faultstring}";
			}
			$resp = (array)$res;
			$response = $resp["getApplicationsResult"];
			echo $response;
		}else if($action == "getVacancySkillsDescription"){
			$adID = $_POST['adID'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getVacancySkillsDescription(array(
													"adID"=>$adID
													)
												);
			} catch (SoapFault $e) {
				//$res = 3;
			    $res = "Error: {$e->faultstring}";
			}

			$resp = (array)$res;			
			$response = $resp["getVacancySkillsDescriptionResult"];
			echo $response;			
		}else if($action == "getVacancyQualificationDetails"){
			$adID = $_POST['adID'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getVacancyQualificationDetails(array(
													"adID"=>$adID
													)
												);
			} catch (SoapFault $e) {
				//$res = 3;
			    $res = "Error: {$e->faultstring}";
			}
			
			$resp = (array)$res;			
			$response = $resp["getVacancyQualificationDetailsResult"];
			echo $response;			
		}else if($action == "getVacancyPerformanceDetails"){
			$adID = $_POST['adID'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getVacancyPerformanceDetails(array(
													"adID"=>$adID
													)
												);
			} catch (SoapFault $e) {
				//$res = 3;
			    $res = "Error: {$e->faultstring}";
			}
			
			$resp = (array)$res;			
			$response = $resp["getVacancyPerformanceDetailsResult"];
			echo $response;						
		}else if($action == "getVacancyCompetencyDetails"){
			$adID = $_POST['adID'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getVacancyCompetencyDetails(array(
													"adID"=>$adID
													)
												);
			} catch (SoapFault $e) {
				//$res = 3;
			    $res = "Error: {$e->faultstring}";
			}
			
			$resp = (array)$res;			
			$response = $resp["getVacancyCompetencyDetailsResult"];
			echo $response;						
		}else if($action == "GETSPECIFICVACANCY"){
			$adID = $_POST['adID'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getSpecificVacancy(array(
													"adID"=>$adID
													)
												);
			} catch (SoapFault $e) {
				//$res = 3;
			    $res = "Error: {$e->faultstring}";
			}
			$resp = (array)$res;
			$response = $resp["getSpecificVacancyResult"];
			echo $response;	
		}else if($action == "REGISTERUSER"){
			$register_email = $_POST['register_email'];
			$register_name = $_POST['register_name'];
			$register_password = $_POST['register_password'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->registerUser(array(
													"emailAddress"=>$register_email,
													"username"=>$register_name,
													"password"=>$register_password
													)
												);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			
			$response = $res->registerUserResult;
			echo $response;	
		}else if($action == "VALIDATEEMAIL"){
			$register_email = $_POST['register_email'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->validateEmailAddress(array(
													"emailAddress"=>$register_email
													)
												);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo($res->validateEmailAddressResult);
		}else if($action == "LOGINUSER"){
			$emailAddress = $_POST['emailAddress'];
			$password = $_POST['password'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->loginUser(array(
											"emailAddress"=>$emailAddress,
											"password"=>$password
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			// echo "<pre>";print_r($res);die();
			echo($res->loginUserResult);
		}else if($action == "SAVEPERSONALDETAILS"){
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
			$email = $_POST['email'];
			$nationalIDNO = $_POST['nationalIDNO'];
			$currentLocation = $_POST['currentLocation'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->insertPersonalDetails(array(
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
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo $res->insertPersonalDetailsResult;
		}else if($action == "EDITPERSONALDETAILS"){
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
			$email = $_POST['email'];
			$nationalIDNO = $_POST['nationalIDNO'];
			$currentLocation = $_POST['currentLocation'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->editPersonalDetails(array(
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
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo $res->editPersonalDetailsResult;
		}else if($action == "SAVEQUALIFICATIONS"){
			$qualifications = $_POST['qualifications'];
			$email = $_POST['email'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->insertQualificationDetails(array(
											"email"=>$email,
											"qualifications"=>$qualifications
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo $res->insertQualificationDetailsResult;
		}else if($action == "SAVEEMPLOYMENTHISTORY"){
			$employmentHistory = $_POST['employmentHistory'];
			$email = $_POST['email'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->insertEmploymentHistoryDetails(array(
											"email"=>$email,
											"employmentHistory"=>$employmentHistory
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo $res->insertEmploymentHistoryDetailsResult;
		}else if($action == "SAVEREFEREES"){
			$referee = $_POST['referee'];
			$email = $_POST['email'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->insertRefereeDetails(array(
											"email"=>$email,
											"referee"=>$referee
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo $res->insertRefereeDetailsResult;
		}else if($action == "MAKEJOBAPPLICATION"){
			$dateOfApplication = $_POST['dateOfApplication'];
			$adID = $_POST['adID'];
			$emailAddress = $_POST['emailAddress'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->applyForPosition(array(
											"adID"=>$adID,
											"emailAddress"=>$emailAddress,
											"dateOfApplication"=>$dateOfApplication
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo $res->applyForPositionResult;
		}else if($action == "GETPERSONALDETAILS"){
			$emailAddress = $_POST['emailAddress'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getPersonalDetails(array(
											"emailAddress"=>$emailAddress
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			//print_r($res);
			echo $res->getPersonalDetailsResult;
		}else if($action == "GETQUALIFICATIONDETAILS"){
			$emailAddress = $_POST['emailAddress'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getQualificationDetails(array(
											"emailAddress"=>$emailAddress
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			//print_r($res);
			echo $res->getQualificationDetailsResult;
		}else if($action == "GETREFEREEDETAILS"){
			$emailAddress = $_POST['emailAddress'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getRefereeDetails(array(
											"emailAddress"=>$emailAddress
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			// print_r($res);
			echo $res->getRefereeDetailsResult;
		}else if($action == "GETEMPLOYMENTHISTORY"){
			$emailAddress = $_POST['emailAddress'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getEmploymentHistory(array(
											"emailAddress"=>$emailAddress
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			// print_r($res);
			echo $res->getEmploymentHistoryResult;
		}else if($action == "CHECKFORREAPPLICATION"){
			$emailAddress = $_POST['emailAddress'];
			$adID = $_POST['adID'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->checkForReApplyForPosition(array(
											"emailAddress"=>$emailAddress,
											"adID" => $adID
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo($res->checkForReApplyForPositionResult);
		}else if($action == "SAVEFILEPATHS"){
			$emailAddress = $_POST['emailAddress'];
			$pathTOCv = $_POST['pathTOCv'];
			$pathTOApplicationLetter = $_POST['pathTOApplicationLetter'];
			// echo "<pre>";print_r($emailAddress)
			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->savefilepaths(array(
											"emailAddress"=>$emailAddress,
											"pathTOCv" => $pathTOCv,
											"pathTOApplicationLetter" => $pathTOApplicationLetter
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo($res->savefilepathsResult);
		}else if($action == "UPDATEACCOUNTDETAILS"){
			$email = $_POST['email'];
			$newPass = $_POST['newPass'];
			$username = $_POST['username'];
			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->updateAccountDetails(array(
											"email"=>$email,
											"newPass" => $newPass,
											"username" => $username
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo $res->updateAccountDetailsResult;		
		}else if($action == "GETUSERDOCS"){
			$emailAddress = $_POST['email'];
			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getUserDocs(array(
											"emailAddress"=>$emailAddress
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}			
			echo $res->getUserDocsResult;
		}else if($action == 'UPDATECOMPLETECV'){
			$emailAddress = $_POST['emailAddress'];
			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->updateCompleteCV(array(
											"emailAddress"=>$emailAddress
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}	
			echo $res->updateCompleteCVResult;
		}else if($action == 'checkForCompletedCV'){
			$emailAddress = $_POST['emailAddress'];
			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->checkForCompletedCV(array(
											"emailAddress"=>$emailAddress
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}			
			echo $res->checkForCompletedCVResult;
		}else if ($action == 'FORGOTPASSWORD') {
			$emailAddress = $_POST['forgot_email'];
			$recoverycode = $_POST['passChangeCode'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->setPasswordChangeRequest(array(
											"email"=>$emailAddress,
											"code"=>$recoverycode
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}			
			echo $res->setPasswordChangeRequestResult;
		}else if ($action == 'changePassword') {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$code = $_POST['code'];
			// echo "<pre>";print_r($email.'<__>'.$password.'<__>'.$code);die();
			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->changePassword(array(
											"email"=>$email,
											"password"=>$password,
											"code"=>$code
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}			
			echo $res->changePasswordResult;
		}else if ($action == 'DUPLICATEPASSREQ') {
			$emailAddress = $_POST['forgot_email'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->preventDuplicateRequest(array(
											"email"=>$emailAddress
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			// echo "<pre>";print_r($res);die();
			echo($res->preventDuplicateRequestResult);
		}else if ($action == 'confirmCode') {
			$emailAddress = $_POST['forgot_email'];
			$verificationCode = $_POST['verification_code'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->confirmVerificationCode(array(
											"email"=>$emailAddress,
											"code"=>$verificationCode
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			// echo "<pre>";print_r($res);die();
			echo($res->confirmVerificationCodeResult);
		}else if ($action == 'confirm_referee') {
			$email = $_POST['email'];
			$refemail = $_POST['refemail'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->confirm_referee(array(
											"userEmail"=>$email,
											"refereeEmail"=>$refemail
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			// echo "<pre>";print_r($res);die();
			echo($res->confirm_refereeResult);
		}else if ($action == 'DELQUALIFICATION') {
			$email = $_POST['emailAddress'];
			$institution = $_POST['institution'];
			$certtype = $_POST['certtype'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->delete_qualification(array(
											"email"=>$email,
											"institution"=>$institution,
											"certtype"=>$certtype
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			// echo "<pre>";print_r($res);die();
			echo($res->delete_qualificationResult);
		}else if ($action == 'DELEMPLOYMENT') {
			$email = $_POST['emailAddress'];
			$institution = $_POST['institution'];
			$position = $_POST['position'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->delete_employment(array(
											"email"=>$email,
											"institution"=>$institution,
											"position"=>$position
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			// echo "<pre>";print_r($res);die();
			echo($res->delete_employmentResult);
		}else if ($action == 'DELREFEREE') {
			$email = $_POST['emailAddress'];
			$refereeEmail = $_POST['refereeEmail'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->delete_referee(array(
											"email"=>$email,
											"refereeEmail"=>$refereeEmail
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			// echo "<pre>";print_r($res);die();
			echo($res->delete_refereeResult);
		}else if ($action == 'REMOVECV') {
			$email = $_POST['email'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->removeCV(array(
											"email"=>$email
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			// echo "<pre>";print_r($res);die();
			echo($res->removeCVResult);
		}else if ($action == 'REMOVEAPPLICATIONLETTER') {
			$email = $_POST['email'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->removeApplicationLetter(array(
											"email"=>$email
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			// echo "<pre>";print_r($res);die();
			echo($res->removeApplicationLetterResult);
		}else{
			echo "Invalid Action";
		}
	}