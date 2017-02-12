$(document).ready(function(){
	$("#editPersonalDetailsBtn").hide();

	//get values from the input fields
	window.getPersonalDetails = function(){
		$fname = $("#fname").val();
		$mname = $("#mname").val();
		$lname = $("#lname").val();
		$mobileNo = $("#mobileNo").val();
		$address = $("#address").val();
		$country = $("#country").val();
		$pin = $("#pinNo").val();
		$passportNo = $("#passportNo").val();
		$disabledStatus = $("#disabledStatus").val();
		$maritalStatus = $("#maritalStatus").val();
		$nationalIDNO = $("#nationalIDNO").val();
		$currentLocation = $("#currentLocation").val();
	}
	//get values from the input fields

	//validate form
	window.validatePersonalDetails = function(){
		getPersonalDetails();

		if($fname == ''){
			$response = "Provide a first name";
			$("#fname").focus();
		}else if($mname == ''){
			$response = "Provide a middle name";
			$("#mname").focus();
		}else if($lname == ''){
			$response = "Provide a last name";
			$("#lname").focus();
		}else if($mobileNo == ''){
			$response = "Provide a mobile number";
			$("#mobileNo").focus();
		}else if($address == ''){
			$("#address").focus();
		}else if($country == ''){
			$response = "Select a country";
			$("#country").focus();
		}else if($pin == ''){
			$response = "Provide your PIN number";
			$("#pinNo").focus();
		}else if($disabledStatus == ''){
			$response = "Please respond to the question on disablity.";
			$("#disabledStatus").focus();
		}else if($maritalStatus == ""){
			$response = "Please respond to the question on marriage.";
			$("#maritalStatus").focus();
		}else{
			//check if mobile numbers is purely digits
			var isnum = /^\d+$/.test($mobileNo);
			if(isnum == false){
				$response = "Your mobile number has to be a number";
			}else{
				$response = "Valid Form";
			}
		}

		return $response;
	}
	//validate form


	//save personal details to DB
	window.savePersonalDetails = function(current){
		getPersonalDetails();//get personal details from input fields	
		$savePersonalDetailsResponse = '';
		$.post($getPersonalDetailsURL,{}, function(data, status){
			$data = JSON.parse(data);
			$status = $data['status'];
			if($status == 1){//no data was returned, therefore save this data
				$.post($savePersonalDetailsURL,
						{
							"fname":$fname,
							"mname":$mname,
							"lname":$lname,
							"mobileNo":$mobileNo,
							"address":$address,
							"country":$country,
							"pin":$pin,
							"passportNo":$passportNo,
							"disabledStatus":$disabledStatus,
							"maritalStatus":$maritalStatus,
							"currentLocation":$currentLocation,
							"nationalIDNO":$nationalIDNO
						}, 
					function(data, status){
						if(data == "Inserted"){
			    			$message = "<center>";
								$message += "<strong>Success.</strong> <br/> Personal Details have successfully Updated.";
							$message += "</center>";
			    			showAlert('alert alert-success','alert alert-danger',$message);

			    // 			if(current < widget.length){ 
							// 	widget.show();
							// 	widget.not(':eq('+(current++)+')').hide();
							// 	setProgress(current);
							// }
							// hideButtons(current);
			    		}else{
			    			$message = "<center>";
								$message += "<strong>Error.</strong> <br/> An error occurred during update please try again.";
							$message += "</center>";
			    			showAlert('alert alert-danger','alert alert-success',$message);
			    		}
				    }
			    );
			}else if($status == 0){//data was returned, to edit this information go to view my CV page 
				$.post($editPersonalDetailsURL,
						{
							"fname":$fname,
							"mname":$mname,
							"lname":$lname,
							"mobileNo":$mobileNo,
							"address":$address,
							"country":$country,
							"pin":$pin,
							"passportNo":$passportNo,
							"disabledStatus":$disabledStatus,
							"maritalStatus":$maritalStatus,
							"currentLocation":$currentLocation,
							"nationalIDNO":$nationalIDNO
						}, 
					function(data, status){
						console.log(data);
						if(data == "Updated"){
			    			$message = "<center>";
								$message += "<strong>Success.</strong> <br/> Personal Details have successfully Updated.";
							$message += "</center>";
			    			showAlert('alert alert-success','alert alert-danger',$message);

			    // 			if(current < widget.length){ 
							// 	widget.show();
							// 	widget.not(':eq('+(current++)+')').hide();
							// 	setProgress(current);
							// }
							// hideButtons(current);
			    		}else{
			    			$message = "<center>";
								$message += "<strong>Error.</strong> <br/> An error occurred during update please try again.";
							$message += "</center>";
			    			showAlert('alert alert-danger','alert alert-success',$message);
			    		}
				    }
			    );
				// $message = "<center>";
				// 	$message += "<strong>Error.</strong> <br/> Go to your CV to edit your personal details.";
				// $message += "</center>";
    // 			showAlert('alert alert-danger','alert alert-success',$message);

				// if(current < widget.length){ 
				// 	widget.show();
				// 	widget.not(':eq('+(current++)+')').hide();
				// 	setProgress(current);
				// }
				// hideButtons(current);
			}else{}
		});
	}
	//save personal details to DB

	//retrives any personal details that the user might have saved
	window.getPersonalDetailsFromDB = function(current,placeInvocked){
		$.post($getPersonalDetailsURL,{}, function(data, status){
			$data = JSON.parse(data);
			$status = $data['status'];

			if($status == 1){
				$message = $data['message'];
				if(placeInvocked === "onPageLoad"){
				}else{					
					$message = "<center>";
						$message += "<strong>Error.</strong> <br/>"+$message;
					$message += "</center>";
	    			showAlert('alert alert-danger','alert alert-success',$message);
				}
				//savePersonalDetails(current);
				//console.log("save to DB");
			}else if($status == 0){
				$message = $data['message'];
				$dataReturned = $data['data'];
				$("#editPersonalDetailsBtn").show();
				console.log("data was returned redirect to next page");
				//set values in the input fields for personal details
				setPersonalDetailsInInputFields($dataReturned);
				
			}else{}			
		});		
	}
	//set values in the input fields for personal details
	window.setPersonalDetailsInInputFields = function($dataReturned){		
		$fname = $dataReturned[0]['fname'];
		$mname = $dataReturned[0]['mname'];
		$lname = $dataReturned[0]['lname'];
		$mobileNo = $dataReturned[0]['mobileNo'];
		$address = $dataReturned[0]['address'];
		$country = $dataReturned[0]['country'];
		$pin = $dataReturned[0]['PIN'];
		$disabledStatus = $dataReturned[0]['physicallyDisabled'];
		$maritalStatus = $dataReturned[0]['maritalStatus'];
		$nationalID = $dataReturned[0]['nationalID'];
		$currentLocation = $dataReturned[0]['currentLocation'];


		$("#fname").val($fname);
		$("#mname").val($mname);
		$("#lname").val($lname);
		$("#mobileNo").val($mobileNo);
		$("#address").val($address);
		$("#country").val($country);
		$("#nationalIDNO").val($nationalID);
		$("#pinNo").val($pin);
		// $("#passportNo").val($passportNo);
		$("#disabledStatus").val($disabledStatus);
		$("#maritalStatus").val($maritalStatus);
		$("#currentLocation").val($currentLocation);
	}

	window.showAlert = function($classToShow,$classToHide,$message){
		$("#personalDetailsFormAlert").removeClass($classToHide);
		$("#personalDetailsFormAlert").addClass($classToShow)
		$("#personalDetailsFormAlert").html($message);
		$("#personalDetailsFormAlert").show();
		setTimeout(function(){
			$(".overlay").hide();
			$("#personalDetailsFormAlert").hide();
		},6000);//give the registration function time to complete before hiding the overlay
	}
})