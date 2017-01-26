$(document).ready(function(){
	$("#alertTag").hide();

	$("#user_submit").click(function(e){
		e.preventDefault();
		$(".overlay").show();

		$register_name = $("#register_name").val();
		$register_email = $("#register_email").val();
		$register_password = $("#register_password").val();
		$confirm_register_password = $("#confirm_register_password").val();
		
		$validatePassResponse = validatePassword($register_password);
		
		if($validatePassResponse == 1){//password does not meet required standards
			$message = "<center>";
				$message += "<strong>Error!</strong> <br/> Password provided do not match the minimum strength requirements";
			$message += "</center>";	
			showAlert('alert alert-danger','alert alert-success',$message);
		}else{//password meets minimum standards
			if($confirm_register_password === $register_password){
				$.post($registerURL,{"register_name":$register_name, "register_email":$register_email, "register_password":$register_password}, function(data, status){
					// console.log(data);
					if(data == "Inserted"){
						$message = "<center>";
							$message += "<strong>Congratulations!</strong> <br/>You have successfully registered.";
						$message += "</center>";

						showAlert('alert alert-success','alert alert-danger',$message);
						window.location.assign($redirectToLoginPage);//redirect to login page			
					}else{
						$message = "<center>";
							$message += "<strong>Error!</strong> <br/>Problem while registering.";
						$message += "</center>";
						showAlert('alert alert-danger','alert alert-success',$message);
					}
				});
			}else{
				$message = "<center>";
					$message += "<strong>Error!</strong> <br/> Passwords provided do not match.";
				$message += "</center>";	
				showAlert('alert alert-danger','alert alert-success',$message);
			}
		}
	});

	$("#register_email").focusout(function(){
		$register_email = $("#register_email").val();
		$("#user_submit").prop('disabled', true);

		$message = "<center>";
			$message += "<strong>Info.</strong> <br/> Validating email address ...";
		$message += "</center>";
		showAlert('alert alert-success','alert alert-danger',$message);


		if($register_email == "" || $register_email == null || $register_email == undefined){
			$message = "<center>";
				$message += "<strong>Error.</strong> <br/> Please provide an email address";
			$message += "</center>";
			showAlert('alert alert-danger','alert alert-success',$message);

			$("#user_submit").prop('disabled', true);
		}else{
			if( !isValidEmailAddress( $register_email ) ) { 
				$message = "<center>";
					$message += "<strong>Info.</strong> <br/>The email provided is invalid";
				$message += "</center>";
				showAlert('alert alert-danger','alert alert-success',$message);
			}else{
				$.post($validateEmailURL,{"register_email":$register_email}, function(data, status){
					// console.log(data);
					$data = JSON.parse(data);

					$status = $data[0]['status'];
					if($status == 0){//doesn't exists
						$resp = $data[0]['message'];

						$message = "<center>";
							$message += "<strong>OK.</strong> <br/>"+$resp;
						$message += "</center>";

						showAlert('alert alert-success','alert alert-danger',$message);
						$("#user_submit").prop('disabled', false);	
					}else{//it exists
						$resp = $data[0]['message'];

						$message = "<center>";
							$message += "<strong>Error.</strong> <br/>"+$resp;
						$message += "</center>";
						showAlert('alert alert-danger','alert alert-success',$message);

						$("#user_submit").prop('disabled', true);
					}
				});
			}
		}
	});

	//validate the email address
	function isValidEmailAddress(emailAddress) {
	    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	    return pattern.test(emailAddress);
	};
	//validate the email address

	window.showAlert = function($classToShow,$classToHide,$message){
		$("#alertTag").removeClass($classToHide);
		$("#alertTag").addClass($classToShow)
		$("#alertTag").html($message);
		$("#alertTag").show();
		setTimeout(function(){
			$(".overlay").hide();
			$("#alertTag").hide();
		},6000);//give the registration function time to complete before hiding the overlay
	}
});






