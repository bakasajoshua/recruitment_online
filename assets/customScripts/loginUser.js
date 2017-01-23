$(document).ready(function(){
	$("#alertTag").hide();

	$("#user_submit").click(function(e){
		e.preventDefault();
		$(".overlay").show();

		$loginDetails = $("#login-form").serializeArray();

		$.post($loginUserURL,{"loginDetails":$loginDetails}, function(data, status){
			console.log(data);

			$data = JSON.parse(data);
			$responseMsg = $data['message'];
			$status = $data['status'];
			
			if($status == 1){
				console.log("invalid login");
				$message = "<center>";
					$message += "<strong>Error.</strong> <br/>"+$responseMsg;
				$message += "</center>";
				showAlert('alert alert-danger','alert alert-success',$message);
			}else if($status == 0){
				console.log("Valid Login");
				$message = "<center>";
					$message += "<strong>Success.</strong> <br/>"+$responseMsg;
				$message += "</center>";
				showAlert('alert alert-success','alert alert-danger',$message);
				window.location.href = $redirectToHomePage;
			}else{}
		});
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
