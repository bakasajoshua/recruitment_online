$(document).ready(function(){
	//https://www.sanwebe.com/question/add-more-fields-using-jquery-capture-with-php
    
	//submit CV
	$("#submitCV").click(function(e){
		e.preventDefault();
		$("#qualificationsForm").serializeArray();//get qualification details
		$("#personalDetailsForm").serializeArray();//get personal details
	});
	//submit CV	
});



