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
}
