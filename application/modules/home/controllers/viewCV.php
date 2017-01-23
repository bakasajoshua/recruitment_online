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

		$data['myCVPersonalDetails'] = $this->getPersonalDetails($this->session->userdata('Email'));
		$data['getQualificationDetails'] = $this->getQualificationDetails($this->session->userdata('Email'));
		$data['getemploymentHistoryDetails'] = $this->getemploymentHistoryDetails($this->session->userdata('Email'));
		$data['getRefereeDetails'] = $this->getRefereeDetails($this->session->userdata('Email'));
		
		$this->load->view('template/template_v.php',$data);
		// $this->load->view('home/viewCV_v');
	}
}
