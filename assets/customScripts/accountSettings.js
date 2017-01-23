$(document).ready(function(){
	$("#UpdateDetails").click(function(){
		$email = $("#email").val();
		$currentPassword = $("#currentPass").val();
		$username = $("#username").val();
		$newPass = $("#newPassword").val();
		$confirmNewPass = $("#confirmNewPass").val();
		$(".overlay").show();

		if($currentPassword == "" || $currentPassword == null || $currentPassword == undefined){
			$message = "<center>";
				$message += "<strong>Error.</strong> <br/> Kindly provide the curret password";
			$message += "</center>";

			showAlert('alert alert-danger','alert alert-success',$message);
			$("#currentPass").focus();
		}else if($newPass == "" || $newPass == null || $newPass == undefined){
			$message = "<center>";
				$message += "<strong>Error.</strong> <br/> Kindly provide the new password";
			$message += "</center>";

			showAlert('alert alert-danger','alert alert-success',$message);
			$("#newPassword").focus();
		}else if($confirmNewPass == "" || $confirmNewPass == null || $confirmNewPass == undefined){
			$message = "<center>";
				$message += "<strong>Error.</strong> <br/> Kindly confirm the new password";
			$message += "</center>";

			showAlert('alert alert-danger','alert alert-success',$message);
			$("#confirmNewPass").focus();
		}else if($username == "" || $username ==  null || $username == undefined){
			$message = "<center>";
				$message += "<strong>Error.</strong> <br/> Kindly provide a username";
			$message += "</center>";

			showAlert('alert alert-danger','alert alert-success',$message);
			$("#username").focus();
		}else{
			if($newPass === $confirmNewPass){//the new password has been confirmed
				$validatePassResponse = validatePassword($newPass);

				if($validatePassResponse == 1){//password does not meet standards
					$message = "<center>";
						$message += "<strong>Error.</strong> <br/>The password does not meet the minimum password requirements.";
					$message += "</center>";

					showAlert('alert alert-danger','alert alert-success',$message);
				}else{//password meest mimimum standards, update where necessary
					$.post($updateUserAccountDetails,{"email":$email,"newPass":$newPass,"username":$username,"currentPassword":$currentPassword}, function(data, status){
						console.log(data);
						$data = JSON.parse(data);
						$status = $data['status'];
						$msg = $data['message'];

						if($status == 1){//an error ocurred
							$message = "<center>";
								$message += "<strong>Error.</strong> <br/> "+$msg;
							$message += "</center>";

							showAlert('alert alert-danger','alert alert-success',$message);
						}else if($status == 0){
							$message = "<center>";
								$message += "<strong>Success!</strong> <br/> "+$msg;
							$message += "</center>";

							showAlert('alert alert-success','alert alert-danger',$message);
						}
					});
				}			
			}else{//new password doesnt match
				$message = "<center>";
					$message += "<strong>Error.</strong> <br/>The new passwords provided do not match.";
				$message += "</center>";

				showAlert('alert alert-danger','alert alert-success',$message);
			}
		}
		
		console.log($email+" "+$currentPassword+" "+$newPass+" "+$confirmNewPass);
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
});