$(document).ready(function(){
	$("#user_submit").click(function(e){
		e.preventDefault();

		$loginDetails = $("#login-form").serializeArray();

		$.post($loginUserURL,{"loginDetails":$loginDetails}, function(data, status){
			console.log(data);
			$data = JSON.parse(data);
			console.log($data);
			if($data['status'] == 1){
				$("#alertTag").html($data['message']);
			}else if($data['status'] == 0){
				// console.log("Valid Login");
				$("#alertTag").html("succesfully logged in. redirecting ...");
				window.location.href = $redirectToHomePage;
			}else{}
			
		});
	});
})
