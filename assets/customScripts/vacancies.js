$(document).ready(function(){
	$("#searchBySalaryDiv").hide();
	$("#searchByJobTitleDiv").hide();
	$("#searchByLocationDiv").hide();

	$("#searchAccordingTo").change(function(){
		$criteria = getFilteringCriteria();

		if($criteria == ''){
			console.log("Select a criteria");
		}else if($criteria == "Location"){
			console.log("By Location");
			$("#searchBySalaryDiv").hide();
			$("#searchByJobTitleDiv").hide();

			$("#searchByLocationDiv").show();
		}else if($criteria == "JobTitle"){
			console.log("By jobTitle");
			$("#searchBySalaryDiv").hide();
			$("#searchByLocationDiv").hide();

			$("#searchByJobTitleDiv").show();
		}else if($criteria == "Salary"){
			console.log("By salary");
			$("#searchByLocationDiv").hide();
			$("#searchByJobTitleDiv").hide();

			$("#searchBySalaryDiv").show();
		}else{}
	});	


	//get filtering criteria
	window.getFilteringCriteria = function(){
		$criteria = $("#searchAccordingTo").val();
		
		return $criteria;
	}
	//get filtering criteria

	//search job vacancies
	$("#searchJobVacancies").click(function(e){
		e.preventDefault();
		$filteringCriteria = getFilteringCriteria();

		if($filteringCriteria == ''){
			console.log("Select a criteria");
		}else if($filteringCriteria == "Location"){
			$searchValue = $("#searchByLocation").val();
		}else if($filteringCriteria == "JobTitle"){
			$jobTitle = $("#searchByJobTitle").val();
		}else if($filteringCriteria == "Salary"){
			$salaryRange = $("#searchBySalary").val();
		}else{}

		if($searchValue != undefined || $searchValue != null || $searchValue != ""){
			$.post($filterVacanciesURL,{"filteringCriteria":$filteringCriteria, "searchValue":$searchValue}, function(data, status){
		    	console.log(data);
		    });
		}
		
	});
	//search job vacancies
});
