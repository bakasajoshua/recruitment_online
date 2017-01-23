<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Test extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$pageNum = 1;//first page number

		$data['content_view'] = 'login/test_v';
		$data['vacancies'] = $this->getVac($pageNum);
		$this->load->view('login/test_v',$data);
		// $this->load->view('login/test_v');
	}

	public function getVac($pageNum){
		$vacancies = $this->getVacancies();
		$vacancies = json_decode($vacancies);

		$groupingofVacancies = array();
		$groupingContainerVacancies = array();
		$groupingCounter = 0;
    	$total_rows = sizeof($vacancies);

    	foreach ($vacancies as $key => $value) {
    		if($groupingCounter == 10){
    			$groupingCounter = 0;
    			array_push($groupingContainerVacancies,$groupingofVacancies);
    			$groupingofVacancies = array();
    		}
    		array_push($groupingofVacancies, $value);
    		$groupingCounter++;
    	}
    	echo "<pre>";
    	//print_r($groupingContainerVacancies[1]);//the vacancies are currently grouped in tens
    	
    	
    	$numberOfPagesPerPage = 10;//number of pages per page
    	//get last page
    	$lastPage = ceil($total_rows/$numberOfPagesPerPage);

    	$row = "";
    	if($pageNum == 1){
			//display first 10 items
			// print_r();
			foreach($groupingContainerVacancies[0] as $key => $value){
				$value = (array)$value;
				$row .= '<div class="job-listing-row clearfix">
							<div class="job-listing-name">';
				$row .= '<h4>'.$value['jobTitle'].'</h4>
							<p class="job-listing-summary">'.$value['jobDescription'].'</p>
						</div>';
				$row .= '<div class="job-listing-region">
							<i class="fa fa-fw fa-map-marker"></i>
							'.$value['location'].'
						</div>';
				$row .= '<div class="job-listing-type hidden-sm hidden-xs">
							<i class="fa fa-fw fa-user"></i>
							'.$value['workSchedule'].'
						</div>';
				$row .= '<div class="job-listing-view">
								<a href= '.base_url("info/viewVacancy/vacancydetails/".$value['adID']).' class="btn btn-view-job">View Job</a>
							</div>
						</div>';
						//<a href= '.base_url("info/viewVacancy").' class="btn btn-view-job">View Job</a>
			}
    	}else if($pageNum ==2 ){
    		//display second 10 items
    		print_r($groupingContainerVacancies[1]);
    	}

    	return $row;
	}
}
