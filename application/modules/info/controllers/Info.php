<?php
defined('BASEPATH') or exit('No direct script access allowed!');

/**
* 
*/
class Info extends MX_Controller
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function index()
	{
		$data['content_view'] = 'info/info_v';
		$this->load->view('template/template_v.php',$data);
	}

	function applications()
	{
		$this->isLoggedIN();
		$data['content_view'] = 'info/applicaions_v';
		$data['vacancies'] = $this->getApplications($this->session->userdata('Email'));
	
		$this->load->view('template/template_v.php',$data);
	}

	public function logout(){
		$this->logoutController();
	}

}
?>