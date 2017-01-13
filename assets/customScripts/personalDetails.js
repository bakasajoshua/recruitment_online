$(document).ready(function(){
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

	window.savePersonalDetails = function(current){
		getPersonalDetails();//get personal details from input fields	
		$savePersonalDetailsResponse = '';
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
				if(data == "Updated"){
	    			$("#personalDetailsFormAlert").html("Personal Details have successfully Updated.");
	    			
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
					hideButtons(current);
	    		}else{
	    			$("#personalDetailsFormAlert").html("An error occurred during update please try again.");
	    		}
		    }
	    );
	}
})