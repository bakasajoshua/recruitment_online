$(document).ready(function(){
	$("#userDocsListContainer").hide();

	$(".col-sm-10").on('change','#documentsCV' , function(){ 
		$fileType = $("#documentsCV")[0].files[0]['type'];
		$fileSize = $("#documentsCV")[0].files[0]['size'];

		if($fileType != "application/pdf"){
	    	$message = "<center>";
				$message += "<strong>Error.</strong> <br/> Kindly provide a <strong>PDF</strong> copy of your <strong>C.V</strong>";
			$message += "</center>";
			showAlert('alert alert-danger','alert alert-success',$message);
			$("#submitCV").prop("disabled", true);
	    }

	    if($fileSize > 2097152){
	    	$message = "<center>";
				$message += "<strong>Error.</strong> <br/> The <strong>application letter</strong> provided is too large. Maximum size <strong>2MB</strong>";
			$message += "</center>";
			showAlert('alert alert-danger','alert alert-success',$message);
			$("#submitCV").prop("disabled", true);
	    }

	    if($fileType === "application/pdf" && $fileSize < 2097152){
	    	$("#submitCV").prop("disabled", false);
	    }
	})

	$(".col-sm-10").on('change','#documentsApplicationLetter' , function(){ 
		$fileType = $("#documentsApplicationLetter")[0].files[0]['type'];
		$fileSize = $("#documentsApplicationLetter")[0].files[0]['size'];

		if($fileType != "application/pdf"){
	    	$message = "<center>";
				$message += "<strong>Error.</strong> <br/> Kindly provide a <strong>PDF</strong> copy of your <strong>Application Letter</strong>";
			$message += "</center>";
			showAlert('alert alert-danger','alert alert-success',$message);
			$("#submitCV").prop("disabled", true);
	    }

	    if($fileSize > 2097152){
	    	$message = "<center>";
				$message += "<strong>Error.</strong> <br/> The <strong>application letter</strong> provided is too large. Maximum size <strong>2MB</strong>";
			$message += "</center>";
			showAlert('alert alert-danger','alert alert-success',$message);
			$("#submitCV").prop("disabled", true);
	    }

	    if($fileType === "application/pdf" && $fileSize < 2097152){
	    	$("#submitCV").prop("disabled", false);
	    }
	})

	$("#submitCV").click(function(){		
		if($("#documentsApplicationLetter").get(0).files.length == 0 || $("#documentsCV").get(0).files.length == 0 ){
			$message = "<center>";
				$message += "<strong>Error.</strong> <br/> Kindly upload a PDF copy of your CV and application letter.";
			$message += "</center>";
			showAlert('alert alert-danger','alert alert-success',$message);
		}else{
			$("#documentsApplicationLetter").upload($saveApplicationLetterURL,function(data){
				$(".overlay").show();
				console.log(data);
				$status = data['status'];
				$msg = data['message'];
				if($status == 1){//error
					if($msg === "Invalid File Type"){
						$message = "<center>";
							$message += "<strong>Error.</strong> <br/>"+$msg;
						$message += "</center>";
					}else{
						$message = "<center>";
							$message += "<strong>Error.</strong> <br/>"+$msg;
						$message += "</center>";
					}
					showAlert('alert alert-danger','alert alert-success',$message);
					$(".overlay").hide();
				}else if($status == 0){//successfull
					$message = "<center>";
						$message += "<strong>Error.</strong> <br/>"+$msg;
					$message += "</center>";
					showAlert('alert alert-success','alert alert-danger',$message);
					uploadCV();//upload the CV
				}else{}
			},function(prog,value){
				$("#prog").val(value);
			});
		}
	});

	window.uploadCV = function(){
		$("#documentsCV").upload($saveCVURL,function(data){
			console.log(data);			
			$status = data['status'];
			$msg = data['message'];

			if($status == 1){//error
				$message = "<center>";
					$message += "<strong>Error.</strong> <br/>"+$msg;
				$message += "</center>";
				showAlert('alert alert-danger','alert alert-success',$message);
			}else if($status == 0){//successfull
				$message = "<center>";
					$message += "<strong>Success.</strong> <br/>"+$msg;
				$message += "</center>";
				showAlert('alert alert-success','alert alert-danger',$message);
				savePathsToDocuments();

				setTimeout(function(){
					window.location.assign($refreshUploadResumePage)
				},5000);
				
			}else{}
		},function(prog,value){
			$("#prog2").val(value);
		});
	}

	window.savePathsToDocuments = function(){
		$.post($savePathsToDocumentsURL,{}, function(data, status){
			console.log(data);
			$data = JSON.parse(data);
			$status = $data['status'];
			$msg = $data['message'];
			if($status == 0){//successfully inserted
				$message = "<center>";
					$message += "<strong>Error.</strong> <br/>"+$msg;
				$message += "</center>";
				showAlert('alert alert-success','alert alert-danger',$message);
			}else if (status ==1){//an error occurred
				$message = "<center>";
					$message += "<strong>Error.</strong> <br/>"+$msg;
				$message += "</center>";
				showAlert('alert alert-danger','alert alert-success',$message);
			}else{}	
		});
	}

	window.getUserDocuements = function(){
		$.post($getUserDocsFromDBURL,{}, function(data, status){
			console.log(data);
			$data = JSON.parse(data);
			$status = $data['status'];

			if($status == 1){
				$msg = $data['message'];
				if(placeInvocked === "onPageLoad"){
				}else{
					$message = "<center>";
						$message += "<strong>Error.</strong> <br/> "+$msg;
					$message += "</center>";
	    			showAlert('alert alert-danger','alert alert-success',$message);
				}
				//savePersonalDetails(current);
				//console.log("save to DB");
			}else if($status == 0){
				$message = $data['message'];
				$dataReturned = $data['data'];
				console.log("data was returned redirect to next page");
				//set values in the input fields for personal details
				displayUserDocsTable($dataReturned);
				
			}else{}			
		});	
	}

		window.displayUserDocsTable = function($dataReturned){
			console.log($dataReturned);
			for($i = 0; $i < $dataReturned.length; $i++){
				$linkToCV = $dataReturned[$i]['linkToCV'];
				$linkToApplicationLetter = $dataReturned[$i]['linkToApplicationLetter'];
				
				$tableRow = '<tr>';
				$tableRow += '<td> <a href="'+$linkToCV+'"> View C.V</a></td>';
				$tableRow += '<td> <a href="'+removeCVURL+'/'+$linkToCV+'"><button class="btn btn-default romove">Remove</button></a></td>';
				// $tableRow += '<td> <button class="btn btn-default romove">Remove</button></td>';
				$tableRow += '<td> <a href="'+$linkToApplicationLetter+'"> View Application Letter</a></td>';
				$tableRow += '<td> <a href="'+appletterCVURL+'/'+$linkToApplicationLetter+'"><button class="btn btn-default romove">Remove</button></a></td>';
				// $tableRow += '<td> <button class="btn btn-default romove">Remove</button></td>';
				$tableRow += '</tr>';

				$("#userDocsList").append($tableRow);
				$("#userDocsListContainer").show();
				$("#documentsForm").hide();
			}

			// $(".remove").click(function(){
			// 	alert('remove button clicked');
			// });
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

	
});