$(document).ready(function(){
	var maxField = 3; //Input fields increment limitation
	var x = 1; //Initial field counter is 1
    $newRow = "";
    var fieldHTML =  {row :function(f){
    		$newRow = '<div style="margin-left:3em; display:inline-block; width:30%;">';
    			$newRow += '<i class="fa fa-times" aria-hidden="true" id="removeReferee" style="float:right; cursor: pointer;"></i>';
    			$newRow += '<div class="col-md-12">';
    				$newRow += '<div class="form-group">';
    					$newRow += '<p>First Name</p>';
    						$newRow += '<input type="text" name="refereesFName[]" value="" class="form-control input-sm" id="refereesFName" placeholder="First Name">';
						$newRow += '<p>Last Name</p>';
							$newRow += '<input type="text" name="refereesLName[]" value="" class="form-control input-sm" id="refereesLName" placeholder="Last Name">';
						$newRow += '<p>Referee Designation</p>';
							$newRow += '<input type="text" name="refereesDesignation[]" value="" class="form-control input-sm" id="refereesDesignation" placeholder="Referee Designation">';
						$newRow += '<p>Organization</p>';
							$newRow += '<input type="text" name="refereesOrganization[]" value="" class="form-control input-sm" id="refereesOrganization" placeholder="Organization">';
						$newRow += '<p>Phone</p>';
							$newRow += '<input type="text" name="refereesPhone[]" value="" class="form-control input-sm" id="refereesPhone" placeholder="Phone">';
						$newRow += '<p>Email</p>';
							$newRow += '<input type="text" name="refereesEmail[]" value="" class="form-control input-sm" id="refereesEmail" placeholder="Email">';
						$newRow += '<p>Website</p>';
							$newRow += '<input type="text" name="refereesWebsite[]" value="" class="form-control input-sm" id="refereesWebsite" placeholder="Website">';
					$newRow += '</div>';								
				$newRow += '</div>';
			$newRow += '</div>';

		return $newRow;
    }};

    $("#refereeListContainer").hide();
    $("#addRefBtn").click(function(e) 
    	{
    		e.preventDefault();
    		$("#refereeListContainer").hide();
    		$("#refereesForm").show();
    	});

	$('#addReferee').click(function(e){ //Once add button is clicked
    	e.preventDefault();
    	$numberOfEmptyFields = 0;
    	$numberOfEmptySelectFields = 0;
    	//check if current input fields have been filled before proceeding
    	$('input', '#refereesForm').each(function(){
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
    		if(x < maxField){ //Check maximum number of input fields
	            x++; //Increment field counter
	            $(".field_wrapperReferees").append(fieldHTML.row(x)); // Add field html
	        }else{
	        	$message = "<center>";
					$message += "<strong>Error.</strong> <br/> You have reached the maximum number of referees(3).";
				$message += "</center>";
    			showAlert('alert alert-danger','alert alert-success',$message);
	        }
		}
    });

    $('.field_wrapperReferees').on('click', '#removeReferee', function(e){ //Once remove button is clicked
        e.preventDefault();
        console.log();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });


    window.validateReferences = function(){
    	$('input', '#refereesForm').each(function(){
	    	if($(this).val() == ""){
	    		$response = "Please fill in all the fields";
	    	}else{
	    		$response = "Valid Form";
	    	}
		})
        return $response
	}

	window.saveRefereeDetails = function(current){
		$refereeFormValues = $('#refereesForm').serializeArray();
		$.post($saveRefereeDetailsURL,
			{
				'refereeFormValues':$refereeFormValues
			},function(data, status){
				console.log(data);
				if(data == "Inserted"){
					$message = "<center>";
						$message += "<strong>Error.</strong> <br/> Successfully saved your referee details.";
					$message += "</center>";
	    			showAlert('alert alert-success','alert alert-danger',$message);

					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
					hideButtons(current);
				}else{					
					$message = "<center>";
						$message += "<strong>Error.</strong> <br/> An error occurred while saving your referee details.";
					$message += "</center>";
	    			showAlert('alert alert-danger','alert alert-success',$message);
				}
			}
		);
	}

	window.getRefereeDetails = function(current){
		$.post($getRefereeDetailsFromDBURL,{}, function(data, status){
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
				displayRefereeDetailsTable($dataReturned);
				
			}else{}			
		});		
	}

	window.displayRefereeDetailsTable = function($dataReturned){
		for($i = 0; $i < $dataReturned.length; $i++){
			$name = $dataReturned[$i]['fname']+" "+$dataReturned[$i]['lname'];
			$email = $dataReturned[$i]['email'];
			$institution = $dataReturned[$i]['organization'];
			$position = $dataReturned[$i]['designation'];
			$mobile = $dataReturned[$i]['mobileNo'];
			$refereesEmail = $dataReturned[$i]['refereesEmail'];
			
			$tableRow = '<tr>';
			$tableRow += '<td>'+$name+'</td>';
			$tableRow += '<td>'+$institution+'</td>';
			$tableRow += '<td>'+$position+'</td>';
			$tableRow += '<td>'+$mobile+'</td>';
			$tableRow += '<td>'+$refereesEmail+'</td>';
			$tableRow += '<td><i class="glyphicon glyphicon-pencil"></i></td>';
			$tableRow += '<td><i class="glyphicon glyphicon-remove"></i></td>';
			$tableRow += '</tr>';

			$("#refereeList").append($tableRow);
			$("#refereeListContainer").show();
			$("#refereesForm").hide();
		}
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