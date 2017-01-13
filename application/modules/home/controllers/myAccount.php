<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class MyAccount extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->isLoggedIN();
		$data['content_view'] = 'home/myAccount_v';
		$this->load->view('template/template_v.php',$data);
	}
}
