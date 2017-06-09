$(document).ready(function(){
	var maxField = 5; //Input fields increment limitation
	var x = 1; //Initial field counter is 1
    $newRow = "";

    $("#employmentListContainer").hide();
    $("#addEmploy").click(function(e)
		{
			e.preventDefault();
			$("#employmentListContainer").hide();
			$("#employmentForm").show();
		});

    var fieldHTML =  {row :function(f){
    	//Employment Institution
    	$newRow = '<div>';
			$newRow += '<div class="col-md-3">';
				$newRow += '<div class="form-group">';
					$newRow += '<p>Institution</p>';
						$newRow += '<div class="col-sm-10">';
							$newRow += '<input type="text" name="employmentInstitution[]" value="" class="form-control" id="employmentInstitution" placeholder="Institution">';
						$newRow +='</div>';
					$newRow += '</div>';
				$newRow +='</div>';
		//Employment Institution

		//Employment position
		$newRow += '<div class="col-md-3">';
			$newRow +='<div class="form-group">';
				$newRow += '<p>Position</p>';
				$newRow += '<div class="col-sm-10">';
					$newRow += '<input type="text" name="employmentPosition[]" value="" class="form-control" id="employmentPosition" placeholder="Position">';
				$newRow += '</div>';
			$newRow += '</div>';
		$newRow += '</div>';
		//Employment position

		//Employment Responsibilities
		$newRow += '<div class="col-sm-4">';
			$newRow += '<div class="form-group">';
				$newRow += '<p>Responsibilities</p>';
					$newRow += '<div class="col-sm-10" >';
						$newRow += '<textarea name="employmentResponsibilities[]" value="" class="form-control" id="employmentResponsibilities" placeholder="Responsibilities"></textarea>';
					$newRow += '</div>';
				$newRow += '</div>';
		$newRow += '</div>';
		//Employment Responsibilities

		//Years Under employment
			$newRow += '<div class="col-md-2" style="width: 10%; display: inline-block;">';
				$newRow += '<div class="form-group">';
					$newRow += '<p>Years</p>';
					$newRow += '<div class="col-sm-10">';
						$newRow += '<input type="number" min="1" name="employmentYears[]" value="" class="form-control" id="employmentYears" placeholder="Years worked" style="">';
					$newRow += '</div>';
				$newRow += '</div>';
			$newRow += '</div>';
			$newRow += '<i class="fa fa-times" aria-hidden="true" id="removeEmploymentHistory" style="display: inline-block; padding-top:3em; cursor:pointer;"></i>';
		$newRow += '</div>';//closes the first DIV under institution
		//Years Under employment

		return $newRow;
    }};

	$('#addEmploymentHistory').click(function(e){ //Once add button is clicked
    	e.preventDefault();
    	$numberOfEmptyFields = 0;
    	$numberOfEmptySelectFields = 0;
    	//check if current input fields have been filled before proceeding
    	$('input', '#employmentForm').each(function(){
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
	            $(".employmentHistoryfield_wrapper").append(fieldHTML.row(x)); // Add field html
	        }
		}
		
        console.log("Add fields button clicked "+$(this).val());
    });

    $('.employmentHistoryfield_wrapper').on('click', '#removeEmploymentHistory', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    window.validateEmploymentHistory = function(){
		$('input', '#employmentForm').each(function(){
	    	if($(this).val() == ""){
	    		$response = "Please fill in all the fields";
	    	}else{
	    		$response = "Valid Form";
	    	}
		})
        return $response;	
	}

	window.saveEmploymentHistoryDetails = function(){
		$employmentHistoryFormValues = $('#employmentForm').serializeArray();
		$.post($saveEmploymentHistoryDetailsURL,
			{
				'employmentHistoryFormValues':$employmentHistoryFormValues
			},function(data, status){
				console.log(data);
				if(data == "Inserted"){
					$message = "<center>";
						$message += "<strong>Success.</strong> <br/> Successfully saved your employment details.";
					$message += "</center>";
	    			showAlert('alert alert-success','alert alert-danger',$message);

					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
					hideButtons(current);
				}else{					
					$message = "<center>";
						$message += "<strong>Error.</strong> <br/> An error occurred while saving your employment details.";
					$message += "</center>";
	    			showAlert('alert alert-danger','alert alert-success',$message);
				}
			}
		);
	}

	window.getEmploymentHistoryDetailsFromDb = function(current,placeInvocked){
		$.post($getEmploymentHistoryDetailsFromDBURL,{}, function(data, status){
			$data = JSON.parse(data);
			$status = $data['status'];

			if($status == 1){//no employment history details havev been saved so far
				$msg = $data['message'];
				if(placeInvocked === "onPageLoad"){
				}else{					
					$message = "<center>";
						$message += "<strong>Error.</strong> <br/> "+$msg;
					$message += "</center>";
	    			showAlert('alert alert-danger','alert alert-success',$message);
				}
			}else if($status ==0){//some employment history has been saved therefore list it
				$message = $data['message'];
				$dataReturned = $data['data'];
				
				$("#editEmploymentnDetailsBtn").show();
				console.log("data was returned redirect to next page");
				//set values in the input fields for personal details
				displayEmploymentHistoryTable($dataReturned);
			}else{}
		});
	}

	window.displayEmploymentHistoryTable = function($dataReturned){
		// console.log($dataReturned+" displayEmploymentHistoryTable");
		$table = "";
		for($i = 0; $i < $dataReturned.length; $i++){
			$email = $dataReturned[$i]['email'];
			$institution = $dataReturned[$i]['institution'];
			$position = $dataReturned[$i]['position'];
			$responsibilities = $dataReturned[$i]['responsibilities'];
			$yearsCompleted = $dataReturned[$i]['yearsCompleted'];
			$data = {'email':$email,'institution':$institution,'position':$position};
			$table = "<tr>"
			$table += "<td>"+$institution+"</td>";
			$table += "<td>"+$position+"</td>";
			$table += "<td>"+$responsibilities+"</td>";
			$table += "<td>"+$yearsCompleted+"</td>";
			// $table += '<td><a href="'+updateEmploymentURL+'/'+$email+'/'+$institution+'/'+$position+'"><button class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true">Edit</i></button></a></td>';
			$table += '<td><a href="'+deleteEmploymentURL+'/'+$email+'/'+$institution+'/'+$position+'"><button class="btn btn-default" style="color: blue;"><i class="fa fa-times" aria-hidden="true">Remove</i></button></a></td>';
			$table += "</tr>";
			$("#employmentForm").hide();

			$("#employmentList").append($table);
			$("#employmentListContainer").show();			
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
})