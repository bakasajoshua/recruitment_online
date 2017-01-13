<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class ForgotPassword extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['content_view'] = 'login/forgotPassword_v';
		$this->load->view('template/template_v.php',$data);
	}
}
