$(document).ready(function(){
	var maxField = 3; //Input fields increment limitation
	var x = 1; //Initial field counter is 1
    $newRow = "";
    var fieldHTML =  {row :function(f){
    		$newRow = '<div style="margin-left:3em; display:inline-block; width:30%;">';
    			$newRow += '<i class="fa fa-times" aria-hidden="true" id="removeReferee" style="float:right;"></i>';
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
			$("#personalDetailsFormAlert").html("Please fill in all the fields before adding another row.");
		}else{
    		if(x < maxField){ //Check maximum number of input fields
	            x++; //Increment field counter
	            $(".field_wrapper").append(fieldHTML.row(x)); // Add field html
	        }else{
	        	$("#personalDetailsFormAlert").html("You have reached the maximum number of referees.");
	        }
		}
    });

    $('.field_wrapper').on('click', '#removeReferee', function(e){ //Once remove button is clicked
        e.preventDefault();
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
					$("#personalDetailsFormAlert").html("Successfully saved your referee details.");
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
					hideButtons(current);
				}else{
					$("#personalDetailsFormAlert").html("An error occurred while saving your referee details.");
				}
			}
		);
	}
});