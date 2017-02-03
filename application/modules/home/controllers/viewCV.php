<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class ViewCV extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->isLoggedIN();
		$data['content_view'] = 'home/viewCV_v';
		$userEmail = $this->session->userdata('Email');
		$data['myCVPersonalDetails'] = $this->getPersonalDetails($userEmail);
		$data['getQualificationDetails'] = $this->getQualificationDetails($userEmail);
		$data['getemploymentHistoryDetails'] = $this->getemploymentHistoryDetails($userEmail);
		$data['getRefereeDetails'] = $this->getRefereeDetails($userEmail);
		$data['getUserDocDetails'] = $this->getUserDocDetails($userEmail);
		
		$this->load->view('template/template_v.php',$data);
		// $this->load->view('home/viewCV_v');
	}
}
