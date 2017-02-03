$(document).ready(function(){
	$("#qualificationListContainer").hide();
	var x = 1; //Initial field counter is 1
	var maxField = 5; //Input fields increment limitation
    $newRow = "";

	var fieldHTML =  {row :function(f){
    	//Institution
    	$newRow = '<div>';
    		$newRow += '<div class="col-md-3">';
				$newRow += '<div class="form-group">';
					$newRow += '<p>Institution</p>';
					$newRow +=' <div class="col-sm-10">';
						$newRow +=' <input type="text" name="school" value="" class="form-control" id="school" placeholder="Institution">';
					$newRow += '</div>';
				$newRow += '</div>';
			$newRow += '</div>';
		//Institution

		//Certification
		$newRow += '<div class="col-md-2">';
			$newRow += '<div class="form-group">';
				$newRow += '<p>Certification</p>';
				$newRow += '<div class="col-sm-10">';

					//$newRow += '<input type="text" name="certification" value="" class="form-control" id="certification" placeholder="Certification">';
					$newRow += '<select class="form-control" name="certification[]" id="certification">';
						$newRow += '<option value="">Select</option>';
						$newRow += '<option value="Professional Certificate">Professional Certificate</option>';																
						$newRow += '<option value="Diploma">Diploma</option>';							      								
						$newRow += '<option value="Degree">Degree</option>';							      								
						$newRow += '<option value="Masters">Masters</option>';
						$newRow += '<option value="Doctorate">Doctorate</option>';
						$newRow += '<option value="PHD">PHD</option>';
					$newRow += '</select>';															

				$newRow += '</div>';
			$newRow += '</div>';
		$newRow += '</div>';
		//Certification


		//Description of certificate
		$newRow += '<div class="col-md-5">';
			$newRow += '<div class="form-group">';
				$newRow += '<p>Description</p>';
				$newRow += '<div class="col-sm-10">';
					$newRow += '<input type="text" name="description" value="" class="form-control" id="description" placeholder="Description">';
				$newRow += '</div>';
			$newRow += '</div>';
		$newRow += '</div>';
		//Description of certificate

		//Years
			$newRow += '<div class="col-md-2" style="width: 10%; display: inline-block;">';
				$newRow += '<div class="form-group">';
					$newRow += '<p>Years Completed</p>';
					$newRow += '<div class="col-sm-10">';
						$newRow += '<input type="number" min="1" name="years" value="" class="form-control" id="years" placeholder="Years"  >';
					$newRow += '</div>';
				$newRow += '</div>';
			$newRow += '</div>';
			$newRow += '<i class="fa fa-times" aria-hidden="true" id="removeQualification" style="display: inline-block; padding-top:3em; cursor: pointer;"></i>';
		$newRow += '</div>';//div for entire row
		//Years
		return $newRow;
    }};

	window.validateQualifications = function(){
	    $('input', '#qualificationsForm').each(function(){
	    	if($(this).val() == ""){
	    		$response = "Please fill in all the fields";
	    	}else{
	    		$response = "Valid Form";
	    	}
		})
        return $response;
	}

	window.saveQualificationDetails = function(current){
		$qualificationsFormValues = $('#qualificationsForm').serializeArray();
		$savePersonalDetailsResponse = '';
		$.post($saveQualificationDetailsURL,
			{
				'qualificationsFormValues':$qualificationsFormValues
			},function(data, status){
				if(data == "Inserted"){
					$message = "<center>";
						$message += "<strong>Error.</strong> <br/> Successfully saved your qualification details.";
					$message += "</center>";
	    			showAlert('alert alert-success','alert alert-danger',$message);

					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
					hideButtons(current);
				}else{
					$message = "<center>";
						$message += "<strong>Error.</strong> <br/> Error occurred while saving";
					$message += "</center>";
	    			showAlert('alert alert-danger','alert alert-success',$message);
				}
			});
	};

	window.getQualificationsFromDB = function(current, placeInvocekd){
		$.post($getQualificationDetailsURL,{}, function(data, status){
			$data = JSON.parse(data);
			$status = $data['status'];

			if($status == 1){//qualification details have not been provided 
				$message = $data['message'];
			}else if($status == 0){//qualification details have been provided
				$message = $data['message'];
				$dataReturned = $data['data'];
				console.log("displayQualificationsTable has been called");
				displayQualificationsTable($dataReturned);
			}
		});
	}

	window.displayQualificationsTable = function($dataReturned){
		for($i = 0; $i < $dataReturned.length; $i++){

			$email = $dataReturned[$i]['email'];
			$institution = $dataReturned[$i]['institution'];
			$certificationType = $dataReturned[$i]['certificationType'];
			$description = $dataReturned[$i]['description'];
			$yearsCompleted = $dataReturned[$i]['yearsCompleted'];
									  				
			$tableRow = '<tr>';
			$tableRow += '<td>'+$institution+'</td>';
			$tableRow += '<td>'+$certificationType+'</td>';
			$tableRow += '<td>'+$description+'</td>';
			$tableRow += '<td>'+$yearsCompleted+'</td>';
			$tableRow += '</tr>';

			$("#qualificationList").append($tableRow);
			$("#qualificationListContainer").show();
			$("#qualificationsForm").hide();
		}
	}

	$('#addQualifications').click(function(e){ //Once add button is clicked
    	e.preventDefault();
    	$numberOfEmptyFields = 0;
    	$numberOfEmptySelectFields = 0;
    	//check if current input fields have been filled before proceeding
    	$('input', '#qualificationsForm').each(function(){
	    	if($(this).val() == ""){
	    		$numberOfEmptyFields++
	    	}
		})
		//check if current input fields have been filled before proceeding

		if($numberOfEmptyFields > 0){
			$message = "<center>";
				$message += "<strong>Error.</strong> <br/> Please fill in all the fields before adding another row.";
			$message += "</center>";
			showAlert('alert alert-danger','alert alert-success',$message);
		}else{
			$certification = $("#certification").val();
			$('select', '#qualificationsForm').each(function(){
		    	if($(this).val() == ""){
		    		$numberOfEmptySelectFields ++;
		    	}
			})

			if($numberOfEmptySelectFields > 0){
	    		$message = "<center>";
					$message += "<strong>Error.</strong> <br/>Please select a type of certification.";
				$message += "</center>";
				showAlert('alert alert-danger','alert alert-success',$message);
	    	}else{
	    		if(x < maxField){ //Check maximum number of input fields
		            x++; //Increment field counter
		            $(".field_wrapperQualifications").append(fieldHTML.row(x)); // Add field html
		        }
	    	}
		}
		
        console.log("Add fields button clicked "+$(this).val());
    });

    $('.field_wrapperQualifications').on('click', '#removeQualification', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

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