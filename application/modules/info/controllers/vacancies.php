<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Vacancies extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['content_view'] = 'info/vacancies_v';
		$data['vacancies'] = $this->getVacancies();
		// echo "<pre>";print_r($data);die();
		$this->load->view('template/template_v.php',$data);
	}

	public function filterVacancies(){
		$criteria = $_POST["filteringCriteria"];
		$searchValue = $_POST["searchValue"];

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => sqlnterfaceURL,
		    CURLOPT_USERAGENT => 'ESSDP',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'action' => 'FILTERVACANCIES',
		        'criteria' => $criteria,
		       	'searchValue'=> $searchValue
		    )
		));
		$result = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		echo $criteria." ".$searchValue;
	}
}
