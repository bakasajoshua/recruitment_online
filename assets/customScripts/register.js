$(document).ready(function(){
	$("#user_submit").click(function(e){
		e.preventDefault();

		$register_name = $("#register_name").val();
		$register_email = $("#register_email").val();
		$register_password = $("#register_password").val();
		$confirm_register_password = $("#confirm_register_password").val();

		if($confirm_register_password === $register_password){
			$.post($registerURL,{"register_name":$register_name, "register_email":$register_email, "register_password":$register_password}, function(data, status){
				if(data == "Inserted"){
					$("#alertTag").html("Successfully Registered");
				}else{
					$("#alertTag").html("Erro occurred during regisration");
				}
			});
		}else{
			$("#alertTag").html("Passwords Do not match");
		}

		$userDetails = $("#register-form").serializeArray();
		console.log($userDetails);
	});

	$("#register_email").focusout(function(){
		$register_email = $("#register_email").val();

		if($register_email == "" || $register_email == null || $register_email == undefined){
			
		}else{
			$.post($validateEmailURL,{"register_email":$register_email}, function(data, status){
				$data = JSON.parse(data);

				$status = $data[0]['status'];
				if($status == 0){//doesn't exists
					console.log($data[0]['message']);
					$("#user_submit").prop('disabled', false);				
				}else{//it exists
					console.log($data[0]['message']);
					$("#alertTag").html($data[0]['message']);
					$("#user_submit").prop('disabled', true);
				}
			});
		}
	});
});