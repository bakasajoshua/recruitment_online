$(document).ready(function(){
	$("#alertTag").hide();

	$("#user_submit").click(function(e){
		e.preventDefault();
		$(".overlay").show();

		$register_password = $("#user_password").val();
		$confirm_register_password = $("#confirm_password").val();
		
		$validatePassResponse = validatePassword($register_password);
		
		if($validatePassResponse == 1){//password does not meet required standards
			$message = "<center>";
				$message += "<strong>Error!</strong> <br/> Password provided do not match the minimum strength requirements";
			$message += "</center>";	
			showAlert('alert alert-danger','alert alert-success',$message);
		}else{//password meets minimum standards
			if($confirm_register_password === $register_password){
				$resetDetails = $("#login-form").serializeArray();

				$.post($restUserURL,{"resetDetails":$resetDetails}, function(data, status){
					console.log(data);

					$data = JSON.parse(data);
					$responseMsg = $data['message'];
					$status = $data['status'];
					
					if($status == 1){
						// console.log("invalid login");
						$message = "<center>";
							$message += "<strong>Error.</strong> <br/>"+$responseMsg;
						$message += "</center>";
						showAlert('alert alert-danger','alert alert-success',$message);
					}else if($status == 0){
						// console.log("Valid Login");
						$message = "<center>";
							$message += "<strong>Success.</strong> <br/>"+$responseMsg;
						$message += "</center>";
						showAlert('alert alert-success','alert alert-danger',$message);
						window.location.href = $redirectToHomePage;
					}else{}
				});
			}else{
				$message = "<center>";
					$message += "<strong>Error!</strong> <br/> Passwords provided do not match.";
				$message += "</center>";	
				showAlert('alert alert-danger','alert alert-success',$message);
			}
		}
	});

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
})
