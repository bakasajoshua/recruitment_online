$(document).ready(function(){
	$("#ApplyForPosition").click(function(){
		if($loginStatus == 1){
			//proceed to apply
			$jobADID = $("#jobADID").val();
			$yearsOfExperience = $("#yearsOfExperience").val();


			$.post($makeApplicationURL,{"jobADID":$jobADID, "yearsOfExperience":$yearsOfExperience}, function(data, status){
				// console.log(data);

				$data = JSON.parse(data);
				$status = $data['status'];
				$msg = $data['message'];

				if($status == 0){
					$message = "<center>";
						$message += "<strong>Success.</strong> <br/>"+$msg;
					$message += "</center>";
	    			showAlert('alert alert-success','alert alert-danger',$message);
				}else if($status == 1){
					$message = "<center>";
						$message += "<strong>Error.</strong> <br/> "+$msg;
					$message += "</center>";
	    			showAlert('alert alert-danger','alert alert-success',$message);
				}else{}
			});
		}else{
			$("#apply-job-modal").modal('toggle');
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
});