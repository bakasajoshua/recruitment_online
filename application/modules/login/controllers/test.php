<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Test extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['content_view'] = 'login/test_v';
		$data['vacancies'] = $this->getVacancies();
		$this->load->view('login/test_v',$data);
		// $this->load->view('login/test_v');
	}
}
