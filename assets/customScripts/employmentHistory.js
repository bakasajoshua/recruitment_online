$(document).ready(function(){
	var maxField = 5; //Input fields increment limitation
	var x = 1; //Initial field counter is 1
    $newRow = "";
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
					$newRow += '<input type="text" name="employmentPosition[]" value="" class="form-control" id="employmentPosition" placeholder="Institution">';
				$newRow += '</div>';
			$newRow += '</div>';
		$newRow += '</div>';
		//Employment position

		//Employment Responsibilities
		$newRow += '<div class="col-sm-4">';
			$newRow += '<div class="form-group">';
				$newRow += '<p>Responsibilities</p>';
					$newRow += '<div class="col-sm-10" >';
						$newRow += '<input type="text" name="employmentResponsibilities[]" value="" class="form-control" id="employmentResponsibilities" placeholder="Responsibilities">';
					$newRow += '</div>';
				$newRow += '</div>';
		$newRow += '</div>';
		//Employment Responsibilities

		//Years Under employment
			$newRow += '<div class="col-md-2" style="width: 10%; display: inline-block;">';
				$newRow += '<div class="form-group">';
					$newRow += '<p>Years</p>';
					$newRow += '<div class="col-sm-10">';
						$newRow += '<input type="number" min="1" name="employmentYears[]" value="" class="form-control" id="employmentYears" placeholder="Years worked" style="width: 50%; display: inline-block;">';
					$newRow += '</div>';
				$newRow += '</div>';
			$newRow += '</div>';
			$newRow += '<i class="fa fa-times" aria-hidden="true" id="removeEmploymentHistory" style="display: inline-block; padding-top:3em;"></i>';
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
			$("#personalDetailsFormAlert").html("Please fill in all the fields before adding another row.");
		}else{
    		if(x < maxField){ //Check maximum number of input fields
	            x++; //Increment field counter
	            $(".field_wrapper").append(fieldHTML.row(x)); // Add field html
	        }
		}
		
        console.log("Add fields button clicked "+$(this).val());
    });

    $('.field_wrapper').on('click', '#removeEmploymentHistory', function(e){ //Once remove button is clicked
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
					$("#personalDetailsFormAlert").html("Successfully saved your employment details.");
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
					hideButtons(current);
				}else{
					$("#personalDetailsFormAlert").html("Error occurred while saving");
				}
			}
		);
	}
})