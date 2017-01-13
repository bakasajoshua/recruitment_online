$(document).ready(function(){
	//https://www.sanwebe.com/question/add-more-fields-using-jquery-capture-with-php

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
						$newRow += '<option value="primary">Primary Education</option>';																
						$newRow += '<option value="Secondary">Secondary Education</option>';							      								
						$newRow += '<option value="cert">Certificate</option>';							      								
						$newRow += '<option value="dip">Diploma</option>';
						$newRow += '<option value="degree">Degree</option>';
						$newRow += '<option value="masters">Masters</option>';
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
			$newRow += '<i class="fa fa-times" aria-hidden="true" id="removeQualification" style="display: inline-block; padding-top:3em;"></i>';
		$newRow += '</div>';//div for entire row
		//Years
		return $newRow;
    }};

    var x = 1; //Initial field counter is 1

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
			$("#personalDetailsFormAlert").html("Please fill in all the fields before adding another row.");
		}else{
			$certification = $("#certification").val();
			$('select', '#qualificationsForm').each(function(){
		    	if($(this).val() == ""){
		    		$numberOfEmptySelectFields ++;
		    	}
			})

			if($numberOfEmptySelectFields > 0){
	    		$("#personalDetailsFormAlert").html("Please select a type of certification.");	
	    	}else{
	    		if(x < maxField){ //Check maximum number of input fields
		            x++; //Increment field counter
		            $(".field_wrapper").append(fieldHTML.row(x)); // Add field html
		        }
	    	}
		}
		
        console.log("Add fields button clicked "+$(this).val());
    });

    $('.field_wrapper').on('click', '#removeQualification', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    
	//submit CV
	$("#submitCV").click(function(e){
		e.preventDefault();
		$("#qualificationsForm").serializeArray();//get qualification details
		$("#personalDetailsForm").serializeArray();//get personal details


	});
	//submit CV	
});



