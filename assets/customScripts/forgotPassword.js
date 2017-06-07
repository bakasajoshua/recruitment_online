$(document).ready(function(){
	$("#alertTag").hide();

	/*$("#email_forgot").keyup(function(){
		console.log('Something is happening');
		$forgot_email = $(this).val();
		$("#user_submit").prop('disabled', true);

		$message = "<center>";
			$message += "<strong>Info.</strong> <br/> Validating email address ...";
		$message += "</center>";
		showAlert('alert alert-success','alert alert-danger',$message);


		if($forgot_email == "" || $forgot_email == null || $forgot_email == undefined){
			$message = "<center>";
				$message += "<strong>Error.</strong> <br/> Please provide an email address";
			$message += "</center>";
			showAlert('alert alert-danger','alert alert-success',$message);

			$("#user_submit").prop('disabled', true);
		}else{
			if( !isValidEmailAddress( $forgot_email ) ) { 
				$message = "<center>";
					$message += "<strong>Info.</strong> <br/>The email provided is invalid";
				$message += "</center>";
				showAlert('alert alert-danger','alert alert-success',$message);
			}else{
				$.post($validateEmailURL,{"forgot_email":$forgot_email}, function(data, status){
					// console.log(data);
					$data = JSON.parse(data);

					$status = $data[0]['status'];
					if($status == 1){// Email exists
						$.post($preventDuplicate,{"email":$forgot_email}, function(data, status){
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
							}else {
								$resp = $data[0]['message'];
								$message = "<center>";
									$message += "<strong>Info.</strong> <br/>"+$resp;
								$message += "</center>";
								showAlert('alert alert-danger','alert alert-success',$message);
							}
						});	
					}else{//it exists
						$resp = $data[0]['message'];

						$message = "<center>";
							$message += "<strong>Error.</strong> <br/> Email provided does not exist";
						$message += "</center>";
						showAlert('alert alert-danger','alert alert-success',$message);

						$("#user_submit").prop('disabled', true);
					}
				});
			}
		}
	});*/

	$("#user_submit").click(function(e){
		e.preventDefault();
		$(".overlay").show();

		$email_forgot = $("#email_forgot").val();
		
		if($email_forgot == "" || $email_forgot == null || $email_forgot == undefined){
			$message = "<center>";
				$message += "<strong>Error.</strong> <br/> Please provide an email address";
			$message += "</center>";
			showAlert('alert alert-danger','alert alert-success',$message);

			// $("#user_submit").prop('disabled', true);
		}else{
			if( !isValidEmailAddress( $email_forgot ) ) { 
				$message = "<center>";
					$message += "<strong>Info.</strong> <br/>The email provided is invalid";
				$message += "</center>";
				showAlert('alert alert-danger','alert alert-success',$message);
			}else{
				$.post($validateEmailURL,{"forgot_email":$email_forgot}, function(data, status){
					// console.log(data);
					$data = JSON.parse(data);

					$status = $data[0]['status'];
					if($status == 1){// Email exists
						$.post($preventDuplicate,{"email":$email_forgot}, function(data, status){
							// console.log(data);
							$data = JSON.parse(data);
							$status = $data[0]['status'];
							if($status == 0){//doesn't exists
								$.post($forgotURL,{"forgot_email":$email_forgot}, function(data, status){
									// console.log(data);
									if(data == "Updated"){
										$message = "<center>";
											$message += "<strong>Congratulations!</strong> <br/>Password change initiated. Check your email for password change code.";
										$message += "</center>";

										showAlert('alert alert-success','alert alert-danger',$message);
										window.location.assign($redirectToResetPage);//redirect to login page			
									}else{
										$message = "<center>";
											$message += "<strong>Error!</strong> <br/>Problem while updating your details.";
										$message += "</center>";
										showAlert('alert alert-danger','alert alert-success',$message);
									}
								});
							}else {
								$resp = $data[0]['message'];
								$message = "<center>";
									$message += "<strong>Info.</strong> <br/>"+$resp;
								$message += "</center>";
								showAlert('alert alert-danger','alert alert-success',$message);
							}
						});	
					}else{//it exists
						$resp = $data[0]['message'];

						$message = "<center>";
							$message += "<strong>Error.</strong> <br/> Email provided does not exist";
						$message += "</center>";
						showAlert('alert alert-danger','alert alert-success',$message);

						// $("#user_submit").prop('disabled', true);
					}
				});
			}
		}
		
		
	});
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