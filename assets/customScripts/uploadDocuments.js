$(document).ready(function(){
	$("#submitCV").click(function(){

		
		if($("#documentsApplicationLetter").get(0).files.length == 0 || $("#documentsCV").get(0).files.length == 0 ){
			alert("Provide this value");
		}else{
			$("#documentsApplicationLetter").upload($saveApplicationLetterURL,function(data){
				console.log(data);
				$status = data['status'];

				if($status == 1){//error
					alert(data['message']);
				}else if($status == 0){//successfull
					alert(data['message']);
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

			if($status == 1){//error
				alert(data['message']);
			}else if($status == 0){//successfull
				alert(data['message']);
				savePathsToDocuments();
			}else{}
		},function(prog,value){
			$("#prog2").val(value);
		});
	}

	window.savePathsToDocuments = function(){
		$.post($savePathsToDocumentsURL,{}, function(data, status){
			console.log(data);
		});
	}
});








