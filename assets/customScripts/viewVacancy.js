$(document).ready(function(){
	$("#ApplyForPosition").click(function(){
		if($loginStatus == 1){
			//proceed to apply
			$jobADID = $("#jobADID").val();

			$.post($makeApplicationURL,{"jobADID":$jobADID}, function(data, status){
				if(data == "Inserted"){
					$("#alertTag").html('Your application has been successfully received.');
				}else{
					$("#alertTag").html(data);
				}
			});
		}else{
			$("#apply-job-modal").modal('toggle');
		}
	});	
});