<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Faqs extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {

		$data['content_view'] = 'info/faqs_v';
		$this->load->view('template/template_v.php',$data);
	}
}
